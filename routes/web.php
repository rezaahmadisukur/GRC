<?php

use App\Http\Controllers\Admin\BookingDashboardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/**
 * Public Access (Customer)
 */

Route::get('/', [CarController::class, 'welcome'])->name('home');

// Route sementara buat ngetes tampilan error
// Route::get('/test-error', function () {
//     abort(500);
// });

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car:plate_code}', [CarController::class, 'show'])->name('cars.show');

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/check-booking', fn() => view('bookings.check-form'))->name('bookings.check-form');
Route::post('/check-booking', [BookingController::class, 'check'])->name('bookings.check.status');

/**
 * Protected Access (Owner & Admin)
 */

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    Route::get('/force-change-password', [ProfileController::class, 'showForceChangePassword'])->name('password.force-change');
    Route::patch('/force-change-password', [ProfileController::class, 'updateForceChangePassword'])->name('password.force-update');

    Route::middleware(['force.password.change'])->group(function () {

        Route::get('/dashboard', [BookingDashboardController::class, 'indexDashboard'])->name('dashboard');
        // Group Operasional (Admin & Owner bisa akses)
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/bookings', [BookingDashboardController::class, 'index'])->name('bookings.index');
            Route::patch('/bookings/{booking}/status', [BookingDashboardController::class, 'updateStatus'])->name('bookings.update-status');

            Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
            Route::get('/reports/download', [ReportController::class, 'downloadPDF'])->name('reports.download');

            Route::get('/cars', [CarController::class, 'indexAdmin'])->name('cars.index');
            Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
            Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
            Route::get('/cars/{car:plate_code}/edit', [CarController::class, 'edit'])->name('cars.edit');
            Route::put('/cars/{car:plate_code}', [CarController::class, 'update'])->name('cars.update');
            Route::delete('/cars/{car:plate_code}', [CarController::class, 'destroy'])->name('cars.destroy');

            /**
             * KHUSUS OWNER (Super Admin)
             */
            Route::middleware(['role:owner'])->group(function () {
                Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
                Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
                Route::patch('/staff/{user}/toggle', [StaffController::class, 'toggleStatus'])->name('staff.toggle');

                Route::patch('/staff/{user}/reset-password', [StaffController::class, 'resetPassword'])->name('staff.reset-password');
            });
        });
    });

});



require __DIR__ . '/auth.php';
