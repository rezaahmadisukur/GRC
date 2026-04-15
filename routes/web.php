<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['cars' => Car::latest()->get()]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * Cars Enpoint
 */
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{car:plate_code}', [CarController::class, 'show'])->name('cars.show');
Route::get('/cars/{car:plate_code}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{car:plate_code}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{car:plate_code}', [CarController::class, 'destroy'])->name('cars.destroy');


Route::get('/cars/{car:plate_code}/rent', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

require __DIR__ . '/auth.php';
