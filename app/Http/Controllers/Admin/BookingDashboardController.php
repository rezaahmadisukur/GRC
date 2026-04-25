<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookingStatusRequest;
use App\Models\Booking;
use App\Models\Car;
use App\Services\BookingService;
use Illuminate\Http\Request;
use InvalidArgumentException;

class BookingDashboardController extends Controller
{
    public function __construct(
        protected BookingService $bookingService
    ) {
    }

    public function index()
    {
        $bookings = Booking::with('car')->latest()->paginate(10);
        $pendingCount = Booking::where('status', 'pending')->count();
        $activeCount = Booking::where('status', 'active')->count();
        $completedCount = Booking::where('status', 'completed')->count();

        return view('admin.bookings.index', compact('bookings', 'pendingCount', 'activeCount', 'completedCount'));
    }

    public function updateStatus(UpdateBookingStatusRequest $request, Booking $booking)
    {
        try {
            $this->bookingService->updateBookingStatus($booking, $request->status, $request->validated());

            return back()->with('success', 'Status booking berhasil diperbarui!');
        } catch (InvalidArgumentException $e) {
            return back()->with('error', 'Gagal! ' . $e->getMessage());
        }
    }

    public function indexDashboard()
    {
        $user = auth()->user();

        $stats = $this->bookingService->getDashboardStatistics($user);
        $chartData = $user->role === 'owner' ? $this->bookingService->getChartData() : [];
        $popularCars = Car::withCount('bookings')->orderBy('bookings_count', 'desc')->take(3)->get();
        $recentBookings = Booking::with(['car', 'user'])->latest()->take(5)->get();

        return view('dashboard', compact('stats', 'chartData', 'popularCars', 'recentBookings', 'user'));
    }
}