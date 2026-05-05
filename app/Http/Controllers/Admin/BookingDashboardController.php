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

    public function index(Request $request)
    {
        $bookings = Booking::filter($request)
            ->with('car')
            ->orderByRaw('DATE(start_date) DESC')
            ->orderBy('start_date', 'DESC')
            ->paginate(10)
            ->withQueryString();
        $pendingCount = Booking::where('status', 'pending')->count();
        $activeCount = Booking::where('status', 'active')->count();
        $completedCount = Booking::where('status', 'completed')->count();
        $totalAllBookings = Booking::count();

        return view('admin.bookings.index', compact('bookings', 'pendingCount', 'activeCount', 'completedCount', 'totalAllBookings'));
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

    public function indexDashboard(Request $request)
    {
        $user = auth()->user();

        // Period Filter Logic
        $period = (int) $request->get('period', 7);
        $to = now();
        $from = match ($period) {
            7 => now()->subDays(7),
            30 => now()->subDays(30),
            90 => now()->subDays(90),
            365 => now()->subYear(),
            default => now()->subDays(7),
        };

        $stats = $this->bookingService->getDashboardStatistics($user, $from, $to);
        $chartData = $user->role === 'owner' ? $this->bookingService->getChartData($from, $to) : [];
        $popularCars = Car::withCount([
            'bookings' => function ($q) use ($from, $to) {
                $q->whereBetween('created_at', [$from, $to]);
            }
        ])->orderBy('bookings_count', 'desc')->take(3)->get();
        $recentBookings = Booking::with(['car', 'user'])->whereBetween('created_at', [$from, $to])->latest()->take(5)->get();

        return view('dashboard', compact('stats', 'chartData', 'popularCars', 'recentBookings', 'user'));
    }
}