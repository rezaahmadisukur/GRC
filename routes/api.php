<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cars/{car}/check-availability', function (App\Models\Car $car, Request $request) {
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ]);

    $isAvailable = $car->isAvailableForDateRange(
        $request->input('start_date'),
        $request->input('end_date')
    );

    return response()->json([
        'available' => $isAvailable,
        'message' => $isAvailable
            ? 'Mobil tersedia untuk tanggal yang dipilih'
            : 'Maaf, mobil sudah ada booking lain pada rentang tanggal ini'
    ]);
});
