<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Car;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();

        $calc = $this->bookingService->calculateBooking(
            $validated['car_id'],
            $validated['start_date'],
            $validated['duration_hours']
        );

        $bookingCode = 'RENT-' . date('ymd') . '-' . strtoupper(Str::random(4));

        $booking = Booking::create(array_merge($validated, [
            'booking_code' => $bookingCode,
            'end_date' => $calc['end_date'],
            'total_price' => $calc['total_price'],
            'remains_payment' => $calc['total_price'],
            'status' => 'pending'
        ]));

        $car = Car::find($validated['car_id']);
        // 1. Rakit pesan mentah
        $message = "PROSES BOOKING BERHASIL\n" .
            "--------------------------\n" .
            "*Kode Booking:* " . $bookingCode . "\n" .
            "*Nama:* " . $validated['customer_name'] . "\n" .
            "*Mobil:* " . $car->name . " (" . $car->plate_code . ")\n" .
            "*Mulai:* " . $validated['start_date'] . "\n" .
            "*Durasi:* " . $validated['duration_hours'] . " Jam\n" .
            "*Total:* Rp " . number_format($calc['total_price'], 0, ',', '.') . "\n\n" .
            "Halo Admin, saya sudah melakukan booking di website. Mohon instruksi selanjutnya.";

        // 2. Gunakan rawurlencode untuk mengubah \n menjadi %0A secara aman
// Jangan gabungkan string URL dengan variabel mentah yang ada \n nya
        $waURL = "https://wa.me/6289671363364?text=" . rawurlencode($message);

        return redirect()->away($waURL);
    }

    public function check(Request $request)
    {
        $request->validate([
            'booking_code' => 'required|string'
        ]);

        $booking = Booking::with('car')->where('booking_code', $request->booking_code)->first();

        if (!$booking) {
            return back()->with('error', 'Yah, Kode Booking-nya nggak ketemu nih. Coba cek lagi ya!');
        }

        if (!$booking) {
            // Kalau ngetes pake Postman (Accept: application/json)
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Kode booking salah!'], 404);
            }
            return back()->with('error', 'Kode tidak ditemukan.');
        }

        // DISINI KUNCINYA:
        // Kalau lu ngetes lewat Postman, dia bakal balikin data JSON
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'data' => $booking
            ]);
        }

        return view('bookings.status', compact('booking'));
    }
}
