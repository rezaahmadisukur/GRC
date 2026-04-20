<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;

class BookingDashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('car')->latest()->paginate(10);
        $pendingCount = Booking::where('status', 'pending')->count();
        $activeCount = Booking::where('status', 'confirmed')->count();
        $completedCount = Booking::where('status', 'completed')->count();

        return view('admin.bookings.index', compact('bookings', 'pendingCount', 'activeCount', 'completedCount'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'dp_amount' => 'nullable|numeric|min:0'
        ]);

        // Jika admin ingin konfirmasi, cek terlebih dahulu apakah mobil
        if ($request->status == 'confirmed') {
            if (!$booking->car->is_available) {
                return back()->with('error', 'Gagal! Mobil ini sudah dikonfirmasi untuk pesanan lain.');
            }

            $dp = $request->input('dp_amount', 0);

            // If it's safe, then confirm and lock the car.
            $booking->update([
                'status' => 'active',
                'dp_amount' => $dp,
                'remains_payment' => $booking->total_price - $dp
            ]);
            $booking->car->update(['is_available' => false]);

            return back()->with('success', 'Booking berhasil dikonfirmasi!');
        }

        // Logic for Cancel or Complete (Unlock the car again)
        if (in_array($request->status, ['cancelled', 'completed'])) {
            $booking->update(['status' => $request->status]);
            $booking->car->update(['is_available' => true]);

            return back()->with('success', 'Status diperbarui, mobil tersedia kembali.');
        }

        $booking->update(['status' => $request->status]);

        return back()->with('success', 'Status booking berhasil diperbarui!');
    }

    public function indexDashboard()
    {
        $stats = [
            'totalCars' => Car::count(),
            'availableCars' => Car::where('is_available', true)->count(),
            'pendingBookings' => Booking::where('status', 'pending')->count(),
            'activeBookings' => Booking::where('status', 'active')->count(),
            'totalRevenue' => Booking::where('status', 'completed')->sum('total_price')
        ];

        // DATA GRAFIK: Pendapatan 7 Hari Terakhir
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $revenue = Booking::where('status', 'completed')
                ->whereDate('created_at', $date)
                ->sum('total_price');

            $chartData['labels'][] = now()->subDays($i)->format('D'); // Nama hari (Mon, Tue, dst)
            $chartData['data'][] = $revenue;
        }

        $recentBookings = Booking::with('car')->latest()->take(5)->get();

        return view('dashboard', compact('stats', 'recentBookings', 'chartData'));
    }
}
