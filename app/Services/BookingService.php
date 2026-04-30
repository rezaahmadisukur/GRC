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
      if (!$booking->car->is_available) {
        throw new InvalidArgumentException('Mobil ini sudah dikonfirmasi untuk pesanan lain.');
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

      $booking->car->update(['is_available' => false]);

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

      $booking->car->update(['is_available' => true]);

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

      if ($booking->status === 'active') {
        $booking->car->update(['is_available' => true]);
      }

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

  public function getDashboardStatistics($user): array
  {
    $isOwner = $user->role === 'owner';

    $baseQuery = Booking::where('status', 'completed');

    $stats = $isOwner
      ? [
        'primaryAmount' => (clone $baseQuery)
          ->whereMonth('created_at', now()->month)
          ->whereYear('created_at', now()->year)
          ->sum('total_price'),
        'label' => 'Omzet Bulan Ini',
        'totalDP' => Booking::sum('dp_amount'),
        'staffCount' => \App\Models\User::where('role', 'admin')->count(),
      ]
      : [
        'primaryAmount' => (clone $baseQuery)
          ->whereDate('created_at', now()->today())
          ->sum('total_price'),
        'label' => 'Pendapatan Hari Ini',
        'totalDP' => Booking::whereDate('created_at', now()->today())->sum('dp_amount'),
        'pendingApproval' => Booking::where('status', 'pending')->count(),
      ];

    $stats['activeBookings'] = Booking::where('status', 'active')->count();
    $stats['availableCars'] = Car::where('is_available', true)->count();

    return $stats;
  }

  public function getChartData(): array
  {
    $chartData = [];

    for ($i = 6; $i >= 0; $i--) {
      $date = now()->subDays($i)->format('Y-m-d');
      $revenue = Booking::where('status', 'completed')
        ->whereDate('created_at', $date)
        ->sum('total_price');

      $chartData['labels'][] = now()->subDays($i)->translatedFormat('D');
      $chartData['data'][] = $revenue;
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
}