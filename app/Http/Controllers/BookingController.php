<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:20',
            'start_date' => 'required|date',
            'duration_hours' => 'required|in:12,24',
            'notes' => 'nullable|string'
        ]);

        $calc = $this->bookingService->calculateBooking(
            $validated['car_id'],
            $validated['start_date'],
            $validated['duration_hours']
        );

        $booking = Booking::create(array_merge($validated, [
            'end_date' => $calc['end_date'],
            'total_price' => $calc['total_price'],
            'remains_payment' => $calc['total_price'],
            'status' => 'pending'
        ]));

        $car = Car::find($validated['car_id']);
        // 1. Rakit pesan mentah
        $message = "Halo Admin, saya ingin menyewa mobil:\n\n" .
            "*Nama:* " . $validated['customer_name'] . "\n" .
            "*Mobil:* " . $car->name . " (" . $car->plate_code . ")\n" .
            "*Mulai:* " . $validated['start_date'] . "\n" .
            "*Durasi:* " . $validated['duration_hours'] . " Jam\n" .
            "*Total:* Rp " . number_format($calc['total_price'], 0, ',', '.') . "\n\n" .
            "Mohon instruksi selanjutnya untuk pembayaran DP.";

        // 2. Gunakan rawurlencode untuk mengubah \n menjadi %0A secara aman
// Jangan gabungkan string URL dengan variabel mentah yang ada \n nya
        $waURL = "https://wa.me/6289671363364?text=" . rawurlencode($message);

        return redirect()->away($waURL);
    }
}
