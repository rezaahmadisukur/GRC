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

        // 1. Logic KONFIRMASI (Admin setujui booking)
        if ($request->status == 'confirmed') {
            if (!$booking->car->is_available) {
                return back()->with('error', 'Gagal! Mobil ini sudah dikonfirmasi untuk pesanan lain.');
            }

            $dp = $request->input('dp_amount', 0);

            $booking->update([
                'status' => 'active',
                'dp_amount' => $dp,
                'remains_payment' => $booking->total_price - $dp,
                'admin_id' => auth()->id()
            ]);
            $booking->car->update(['is_available' => false]);

            return back()->with('success', 'Booking berhasil dikonfirmasi!');
        }

        // 2. Logic SELESAI (Sewa Berakhir)
        if ($request->status == 'completed') {
            $booking->update([
                'status' => 'completed',
                'remains_payment' => 0 // <--- Anggap Lunas pas selesai
            ]);

            $booking->car->update([
                'is_available' => true
            ]);
            return back()->with('success', 'Transaksi selesai! Mobil sekarang tersedia kembali.');
        }

        // 3. Logic BATAL (Cancel)
        if ($request->status == 'cancelled') {
            $booking->update([
                'status' => 'cancelled'
            ]);
            $booking->car->update([
                'is_available' => true
            ]);
            return back()->with('success', 'Booking telah dibatalkan.');
        }

        // if (in_array($request->status, ['cancelled', 'completed'])) {
        //     $booking->update(['status' => $request->status]);
        //     $booking->car->update(['is_available' => true]);

        //     return back()->with('success', 'Status diperbarui, mobil tersedia kembali.');
        // }

        $booking->update(['status' => $request->status]);

        return back()->with('success', 'Status booking berhasil diperbarui!');
    }

    public function indexDashboard()
    {
        $user = auth()->user();

        // 1. STATS: Bedakan antara Owner & Admin
        if ($user->role === 'owner') {
            $stats = [
                'primaryAmount' => Booking::where('status', 'completed')
                    ->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->sum('total_price'), // Omzet Bulanan
                'label' => 'Omzet Bulan Ini',
                'totalDP' => Booking::sum('dp_amount'),
                'staffCount' => \App\Models\User::where('role', 'admin')->count(),
            ];
        } else {
            $stats = [
                'primaryAmount' => Booking::where('status', 'completed')
                    ->whereDate('created_at', now()->today())
                    ->sum('total_price'), // Omzet Hari Ini saja
                'label' => 'Pendapatan Hari Ini',
                'totalDP' => Booking::whereDate('created_at', now()->today())->sum('dp_amount'),
                'pendingApproval' => Booking::where('status', 'pending')->count(),
            ];
        }

        // Common Stats (Dua-duanya perlu tau stok mobil)
        $stats['activeBookings'] = Booking::where('status', 'active')->count();
        $stats['availableCars'] = Car::where('is_available', true)->count();

        // 2. DATA GRAFIK: Owner liat 7 hari, Admin mungkin gak perlu (atau kita batasi)
        $chartData = [];
        if ($user->role === 'owner') {
            for ($i = 6; $i >= 0; $i--) {
                $date = now()->subDays($i)->format('Y-m-d');
                $revenue = Booking::where('status', 'completed')->whereDate('created_at', $date)->sum('total_price');
                $chartData['labels'][] = now()->subDays($i)->translatedFormat('D');
                $chartData['data'][] = $revenue;
            }
        }

        // 3. DATA PENUNJANG
        $popularCars = Car::withCount('bookings')->orderBy('bookings_count', 'desc')->take(3)->get();

        // Recent Bookings: Kita tambahin relasi 'user' biar keliatan siapa yang approve
        $recentBookings = Booking::with(['car', 'user'])->latest()->take(5)->get();

        return view('dashboard', compact('stats', 'chartData', 'popularCars', 'recentBookings', 'user'));
    }
}
