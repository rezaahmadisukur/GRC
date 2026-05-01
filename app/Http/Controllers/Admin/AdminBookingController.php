<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function create()
    {
        $cars = Car::where('is_available', true)->orderBy('name')->get();

        return view('admin.bookings.quick-create', compact('cars'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'start_date' => 'required|date',
            'duration_type' => 'required|integer|in:12,24',
            'extra_hours' => 'nullable|integer|min:0|max:12',
            'transaction_mode' => 'required|in:immediate,booking',
            'cash_paid' => 'nullable|numeric|min:0|required_if:transaction_mode,immediate',
            'dp_amount' => 'nullable|numeric|min:0|required_if:transaction_mode,booking',
            'notes' => 'nullable|string',
        ]);

        $extraHours = (int) ($validated['extra_hours'] ?? 0);
        $totalHours = $validated['duration_type'] + $extraHours;

        $startDate = Carbon::parse($validated['start_date']);
        $endDate = $startDate->copy()->addHours($totalHours);

        // Cek ketersediaan mobil
        $car = Car::findOrFail($validated['car_id']);
        if (!$car->isAvailableForDateRange($startDate, $endDate)) {
            return back()->withInput()->with('error', 'Maaf, mobil sudah ada booking lain pada rentang tanggal ini.');
        }

        if ($validated['transaction_mode'] === 'immediate') {
            // Mode Langsung Ambil Mobil
            $booking = $this->bookingService->createWalkinBooking($validated);
        } else {
            // Mode Booking Saja
            $validated['dp_amount'] = $validated['dp_amount'] ?? 0;
            $booking = $this->bookingService->createBooking($validated);

            if ($validated['dp_amount'] > 0) {
                $this->bookingService->confirmBooking($booking, $validated['dp_amount']);
            }
        }

        return redirect()->route('admin.quick-booking.receipt', $booking)
            ->with('success', 'Booking berhasil dibuat!');
    }

    public function receipt(Booking $booking)
    {
        return view('admin.bookings.receipt', compact('booking'));
    }
}