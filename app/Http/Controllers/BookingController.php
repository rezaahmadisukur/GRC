<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(StoreBookingRequest $request)
    {
        $booking = $this->bookingService->createBooking($request->validated());

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
        $totalAllBookings = \App\Models\Booking::count();

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
