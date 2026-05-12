<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreBookingRequest;
use App\Models\Booking;
use App\Models\Car;
use App\Services\BookingService;
use Carbon\Carbon;

class AdminBookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function create()
    {
        $cars = Car::orderBy('name')->paginate(12);

        // Stats untuk header bar - dihitung sekali dari database bukan dari pagination
        $carStats = $this->bookingService->getCarStats();
        $bookedDates = $this->bookingService->getBookedDates();

        return view('admin.bookings.quick-create', compact('cars', 'bookedDates', 'carStats'));
    }

    public function store(AdminStoreBookingRequest $request)
    {
        $booking = $this->bookingService->adminCreateBooking($request->validated());
        return redirect()->route('admin.quick-booking.receipt', $booking)
            ->with('success', 'Booking berhasil dibuat!');
    }

    public function receipt(Booking $booking)
    {
        return view('admin.bookings.receipt', compact('booking'));
    }
}