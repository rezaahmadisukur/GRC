<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\DTOs\BookingDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreBookingRequest;
use App\Models\Booking;
use App\Models\Car;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class AdminBookingController extends Controller
{
    protected BookingService $bookingService;

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

    public function store(AdminStoreBookingRequest $request): RedirectResponse
    {
        try {
            $bookingDTO = BookingDTO::fromRequest($request->validated());
            $dpAmount = (float) ($request->validated()['dp_amount'] ?? 0);

            $booking = $this->bookingService->adminCreateBooking($bookingDTO, $dpAmount);
            return redirect()->route('admin.quick-booking.receipt', $booking)
                ->with('success', 'Booking berhasil dibuat!');
        } catch (\InvalidArgumentException $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function receipt(Booking $booking)
    {
        return view('admin.bookings.receipt', compact('booking'));
    }
}