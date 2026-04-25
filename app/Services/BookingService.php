<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BookingService
{
  public function calculateBooking($carId, $startDate, $durationHours)
  {
    $car = Car::find($carId);
    $start = Carbon::parse($startDate);
    $end = $start->copy()->addHours((int) $durationHours);

    // Hitung harga dasar + jam tambahan
    $baseHours = $durationHours >= 24 ? 24 : 12;
    $extraHours = $durationHours - $baseHours;

    if ($baseHours === 12) {
      $totalPrice = $car->price_12h;
      $pricePerExtraHour = $car->price_12h / 12;
    } else {
      $totalPrice = $car->price_24h;
      $pricePerExtraHour = $car->price_24h / 24;
    }

    // Tambahkan biaya jam tambahan
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
    $bookingCode = 'RENT-' . date('ymd') . '-' . strtoupper(Str::random(4));
    $extra = (int) $data['extra_hours'] ?? 0;
    $totalHours = (int) $data['duration_type'] + $extra;

    $calc = $this->calculateBooking(
      $data['car_id'],
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
  }
  public function generateWhatsAppUrl(Booking $booking): string
  {
    $adminNumber = config('services.whatsapp.number');
    $car = $booking->car;

    // 1. Rakit pesan mentah
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
}