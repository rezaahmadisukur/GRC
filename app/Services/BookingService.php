<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Car;
use Carbon\Carbon;

class BookingService
{
  public function calculateBooking($carId, $startDate, $durationHours)
  {
    $car = Car::find($carId);
    $start = Carbon::parse($startDate);
    $end = $start->copy()->addHours((int) $durationHours);

    // Ambil harga berdasarkan kolom di database lu
    if ((int) $durationHours === 12) {
      $totalPrice = $car->price_12h;
    } else {
      $totalPrice = $car->price_24h;
    }

    return [
      'end_date' => $end,
      'total_price' => $totalPrice,
    ];
  }
}