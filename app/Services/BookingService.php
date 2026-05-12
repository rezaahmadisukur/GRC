<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class BookingService
{
  public const DURATION_12H = 12;
  public const DURATION_24H = 24;

  public function calculateBooking(int $carId, string $startDate, int $durationHours): array
  {
    $car = Car::findOrFail($carId);
    $start = Carbon::parse($startDate);
    $end = $start->copy()->addHours($durationHours);

    $baseHours = $durationHours >= self::DURATION_24H ? self::DURATION_24H : self::DURATION_12H;
    $extraHours = $durationHours - $baseHours;

    if ($baseHours === self::DURATION_12H) {
      $totalPrice = $car->price_12h;
      $pricePerExtraHour = $car->price_12h / self::DURATION_12H;
    } else {
      $totalPrice = $car->price_24h;
      $pricePerExtraHour = $car->price_24h / self::DURATION_24H;
    }

    if ($extraHours > 0) {
      $totalPrice += $extraHours * $pricePerExtraHour;
    }

    return [
      'end_date' => $end,
      'total_price' => $totalPrice,
    ];
  }

  public function createBooking(array $data): Booking
  {
    return DB::transaction(function () use ($data) {
      $bookingCode = $this->generateUniqueBookingCode();
      $extra = (int) ($data['extra_hours'] ?? 0);
      $totalHours = (int) $data['duration_type'] + $extra;

      $calc = $this->calculateBooking(
        (int) $data['car_id'],
        $data['start_date'],
        $totalHours
      );

      return Booking::create(array_merge($data, [
        'booking_code' => $bookingCode,
        'duration_hours' => $totalHours,
        'end_date' => $calc['end_date'],
        'total_price' => $calc['total_price'],
        'remains_payment' => $calc['total_price'],
        'status' => 'pending'
      ]));
    });
  }

  public function confirmBooking(Booking $booking, float $dpAmount = 0, ?int $adminId = null): Booking
  {
    return DB::transaction(function () use ($booking, $dpAmount, $adminId) {
      // Cek ketersediaan mobil berdasarkan tanggal booking saja, bukan global
      if (!$booking->car->isAvailableForDateRange($booking->start_date, $booking->end_date, $booking->id)) {
        throw new InvalidArgumentException('Mobil ini sudah ada booking lain yang tumpang tindih pada tanggal yang sama.');
      }

      if ($booking->status !== 'pending') {
        throw new InvalidArgumentException('Hanya booking dengan status pending yang dapat dikonfirmasi.');
      }

      $booking->update([
        'status' => 'active',
        'dp_amount' => $dpAmount,
        'remains_payment' => $booking->total_price - $dpAmount,
        'admin_id' => $adminId ?? auth()->id()
      ]);

      // TIDAK LAGI set mobil jadi tidak tersedia secara global!
      // Sekarang ketersediaan di cek berdasarkan tanggal overlapping saja

      return $booking;
    });
  }

  public function completeBooking(Booking $booking, float $penaltyAmount = 0, ?string $returnNotes = null): Booking
  {
    return DB::transaction(function () use ($booking, $penaltyAmount, $returnNotes) {
      if ($booking->status !== 'active') {
        throw new InvalidArgumentException('Hanya booking dengan status active yang dapat diselesaikan.');
      }

      $actualReturn = now();

      $booking->update([
        'status' => 'completed',
        'actual_end_date' => $actualReturn,
        'penalty_amount' => $penaltyAmount,
        'final_total_price' => $booking->total_price + $penaltyAmount,
        'return_notes' => $returnNotes,
        'remains_payment' => 0
      ]);

      // TIDAK LAGI set mobil jadi tersedia secara global disini
      // Ketersediaan sekarang diatur berdasarkan tanggal saja

      return $booking;
    });
  }

  public function cancelBooking(Booking $booking): Booking
  {
    return DB::transaction(function () use ($booking) {
      if (in_array($booking->status, ['completed', 'cancelled'], true)) {
        throw new InvalidArgumentException('Booking ini tidak dapat dibatalkan.');
      }

      $booking->update([
        'status' => 'cancelled'
      ]);

      // TIDAK LAGI merubah status is_available mobil disini

      return $booking;
    });
  }

  public function updateBookingStatus(Booking $booking, string $status, array $data = []): Booking
  {
    return match ($status) {
      'confirmed' => $this->confirmBooking($booking, (float) ($data['dp_amount'] ?? 0)),
      'completed' => $this->completeBooking($booking, (float) ($data['penalty_amount'] ?? 0), $data['return_notes'] ?? null),
      'cancelled' => $this->cancelBooking($booking),
      default => throw new InvalidArgumentException("Status booking tidak valid: {$status}")
    };
  }

  public function generateWhatsAppUrl(Booking $booking): string
  {
    $adminNumber = config('services.whatsapp.number');
    $car = $booking->car;

    $message = "PROSES BOOKING BERHASIL\n" .
      "--------------------------\n" .
      "*Kode Booking:* {$booking->booking_code}\n" .
      "*Nama:* {$booking->customer_name}\n" .
      "*Mobil:* {$car->name} ({$car->plate_code})\n" .
      "*Mulai:* {$booking->start_date}\n" .
      "*Durasi:* {$booking->duration_hours} Jam\n" .
      "*Total:* Rp " . number_format($booking->total_price, 0, ',', '.') . "\n\n" .
      "Halo Admin, saya sudah melakukan booking di website. Mohon instruksi selanjutnya.";

    return "https://wa.me/" . $adminNumber . "?text=" . rawurlencode($message);
  }

  public function searchBookings(string $query)
  {
    return Booking::with('car')
      ->where('booking_code', $query)
      ->orWhere('whatsapp_number', $query)
      ->latest()
      ->get();
  }

  public function getDashboardStatistics($user, $from = null, $to = null): array
  {
    $isOwner = $user->role === 'owner';
    $from = $from ?? now()->subDays(7);
    $to = $to ?? now();

    $days = $to->diffInDays($from);
    $prevFrom = $from->copy()->subDays($days);
    $prevTo = $from->copy()->subDay();

    $baseQuery = Booking::where('status', 'completed')
      ->whereBetween('created_at', [$from, $to]);

    $prevQuery = Booking::where('status', 'completed')
      ->whereBetween('created_at', [$prevFrom, $prevTo]);

    $currentTotal = (clone $baseQuery)->sum('total_price');
    $prevTotal = (clone $prevQuery)->sum('total_price');

    $growth = $prevTotal > 0 ? round((($currentTotal - $prevTotal) / $prevTotal) * 100, 1) : 0;

    $stats = $isOwner
      ? [
        'primaryAmount' => $currentTotal,
        'growth' => $growth,
        'label' => 'Total Pendapatan',
        'totalDP' => Booking::whereBetween('created_at', [$from, $to])->sum('dp_amount'),
        'staffCount' => \App\Models\User::where('role', 'admin')->count(),
      ]
      : [
        'primaryAmount' => $currentTotal,
        'growth' => $growth,
        'label' => 'Pendapatan',
        'totalDP' => Booking::whereBetween('created_at', [$from, $to])->sum('dp_amount'),
        'pendingApproval' => Booking::where('status', 'pending')->count(),
      ];

    $stats['activeBookings'] = Booking::where('status', 'active')->count();
    $stats['availableCars'] = Car::where('is_available', true)->count();

    return $stats;
  }

  public function getChartData($from = null, $to = null): array
  {
    $from = $from ?? now()->subDays(7);
    $to = $to ?? now();

    $chartData = [];
    $days = $to->diffInDays($from);

    // Auto grouping based on date range
    if ($days <= 7) {
      // <= 7 hari: per hari
      for ($i = $days; $i >= 0; $i--) {
        $date = $to->copy()->subDays($i);
        $revenue = Booking::where('status', 'completed')
          ->whereDate('created_at', $date)
          ->sum('total_price');

        $chartData['labels'][] = $date->translatedFormat('D');
        $chartData['data'][] = $revenue;
      }
    } elseif ($days <= 31) {
      // 8 - 31 hari: per minggu
      $current = clone $from;
      while ($current <= $to) {
        $weekEnd = $current->copy()->endOfWeek();
        if ($weekEnd > $to)
          $weekEnd = clone $to;

        $revenue = Booking::where('status', 'completed')
          ->whereBetween('created_at', [$current->startOfDay(), $weekEnd->endOfDay()])
          ->sum('total_price');

        $chartData['labels'][] = 'Mg ' . $current->weekOfMonth;
        $chartData['data'][] = $revenue;

        $current->addWeek()->startOfWeek();
      }
    } else {
      // > 31 hari: per bulan
      $current = clone $from;
      while ($current <= $to) {
        $monthEnd = $current->copy()->endOfMonth();
        if ($monthEnd > $to)
          $monthEnd = clone $to;

        $revenue = Booking::where('status', 'completed')
          ->whereBetween('created_at', [$current->startOfMonth(), $monthEnd->endOfMonth()])
          ->sum('total_price');

        $chartData['labels'][] = $current->translatedFormat('M');
        $chartData['data'][] = $revenue;

        $current->addMonth()->startOfMonth();
      }
    }

    return $chartData;
  }

  protected function generateUniqueBookingCode(): string
  {
    do {
      $code = 'RENT-' . date('ymd') . '-' . strtoupper(Str::random(4));
    } while (Booking::where('booking_code', $code)->exists());

    return $code;
  }

  public function adminCreateBooking(array $data): Booking
  {
    return DB::transaction(function () use ($data) {
      $extraHours = (int) ($data['extra_hours'] ?? 0);
      $totalHours = (int) $data['duration_type'] + $extraHours;
      $startDate = Carbon::parse($data['start_date']);
      $endDate = $startDate->copy()->addHours($totalHours);

      // Cek ketersediaan mobil
      $car = Car::findOrFail($data['car_id']);
      if (!$car->isAvailableForDateRange($startDate, $endDate)) {
        return back()->withInput()->with('error', 'Maaf, mobil sudah ada booking lain pada rentang tanggal ini.');
      }

      $data['dp_amount'] = $data['dp_amount'] ?? 0;
      $booking = $this->createBooking($data);

      if ((float) $data['dp_amount'] > 0) {
        $this->confirmBooking($booking, (float) $data['dp_amount']);
      }

      return $booking;
    });
  }

  public function getBookedDates()
  {
    return Booking::whereIn('status', ['pending', 'active'])
      ->select('car_id', 'start_date', 'end_date', 'status')
      ->get()
      ->map(function ($booking) {
        return [
          'car_id' => $booking->car_id,
          'start' => $booking->start_date->format('Y-m-d'),
          'end' => $booking->end_date->format('Y-m-d'),
          'status' => $booking->status
        ];
      });
    ;
  }

  public function getCarStats()
  {
    return [
      'totalCars' => Car::count(),
      'availableCars' => Car::where('is_available', true)->count(),
      'unavailableCars' => Car::where('is_available', false)->count()
    ];
  }
}