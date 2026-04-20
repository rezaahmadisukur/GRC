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
        // Aman: request->input() selalu return nilai, tidak error jika key tidak ada
        $extra = (int) $request->input('extra_hours', 0);
        $totalHours = (int) $validated['duration_type'] + $extra;

        $calc = $this->bookingService->calculateBooking(
            $validated['car_id'],
            $validated['start_date'],
            $totalHours
        );

        $bookingCode = 'RENT-' . date('ymd') . '-' . strtoupper(Str::random(4));

        $booking = Booking::create(array_merge($validated, [
            'booking_code' => $bookingCode,
            'duration_hours' => $totalHours,
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
            "*Durasi:* " . $totalHours . " Jam\n" .
            "*Total:* Rp " . number_format($calc['total_price'], 0, ',', '.') . "\n\n" .
            "Halo Admin, saya sudah melakukan booking di website. Mohon instruksi selanjutnya.";


        $adminNumber = config('services.whatsapp.number');

        // 2. Gunakan rawurlencode untuk mengubah \n menjadi %0A secara aman
        // Jangan gabungkan string URL dengan variabel mentah yang ada \n nya
        $waURL = "https://wa.me/" . $adminNumber . "?text=" . rawurlencode($message);

        return redirect()->away($waURL);
    }

    public function check(Request $request)
    {
        $request->validate([
            'query' => 'required|string'
        ]);

        $search = $request->input('query');



        $bookings = Booking::with('car')
            ->where('booking_code', $search)
            ->orWhere('whatsapp_number', $search)
            ->latest()
            ->get();

        if ($bookings->isEmpty()) {
            return back()->with('error', 'Data nggak ketemu nih. Coba cek lagi kode atau nomor WA-nya ya!');
        }

        if ($bookings->count() === 1 && $bookings->first()->booking_code === $search) {
            $booking = $bookings->first();
            return view('bookings.status', compact('booking'));
        }

        return view('bookings.index', compact('bookings'));

    }
}
