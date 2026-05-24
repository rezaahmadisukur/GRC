<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTOs\BookingDTO;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Car;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected BookingService $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $bookingDTO = BookingDTO::fromRequest($request->validated());

        // Calculate end date first
        $startDate = $bookingDTO->startDate;
        $endDate = $bookingDTO->endDate();

        // Check availability before creating booking
        $car = Car::findOrFail($bookingDTO->carId);
        if (!$car->isAvailableForDateRange($startDate, $endDate)) {
            return back()->withInput()->with('error', 'Maaf, mobil sudah di booking orang lain pada rentang tanggal dan waktu yang anda pilih. Silahkan pilih tanggal lain.');
        }

        $booking = $this->bookingService->createBooking($bookingDTO);

        $waURL = $this->bookingService->generateWhatsAppUrl($booking);

        return redirect()->away($waURL);
    }

    public function check(Request $request)
    {
        $request->validate([
            'query' => 'required|string'
        ]);

        $search = $request->input('query');

        $bookings = $this->bookingService->searchBookings($search);
        $totalAllBookings = Booking::count();

        if ($bookings->isEmpty()) {
            return back()->with('error', 'Data nggak ketemu nih!');
        }

        if ($bookings->count() === 1 && $bookings->first()->booking_code === $search) {
            $booking = $bookings->first();
            return view('bookings.status', compact('booking'));
        }

        return view('bookings.index', compact('bookings', 'totalAllBookings'));

    }
}
