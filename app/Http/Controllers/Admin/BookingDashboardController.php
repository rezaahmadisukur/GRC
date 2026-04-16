<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingDashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('car')->latest()->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        // If the admin wants to confirm, please check first whether the car is still there or not?
        if ($request->status == 'confirmed') {
            if (!$booking->car->is_available) {
                return back()->with('error', 'Gagal! Mobil ini sudah dikonfirmasi untuk pesanan lain.');
            }

            // If it's safe, then confirm and lock the car.
            $booking->update(['status' => 'confirmed']);
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
}
