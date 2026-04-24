<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        return view('admin.reports.index');
    }

    public function downloadPDF(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $bookings = Booking::whereBetween('start_date', [$startDate, $endDate])
            ->with('car')
            ->get();

        $totalOmzet = $bookings->sum('final_total_price');

        $pdf = Pdf::loadView('admin.reports.pdf_template', [
            'bookings' => $bookings,
            'total' => $totalOmzet,
            'period' => $startDate . 's/d' . $endDate
        ]);

        return $pdf->download('Laporan_GRC_Rental.pdf');
    }
}
