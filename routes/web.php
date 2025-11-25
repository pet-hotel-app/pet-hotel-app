<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pet Hotel resources
    Route::resource('owners', OwnerController::class);
    Route::resource('pets', PetController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('services', ServiceController::class)->except(['create','edit']);
    Route::resource('bookings', BookingController::class);
    Route::resource('invoices', InvoiceController::class)->only(['index','show','update']);

    // Reports
    Route::get('reports/bookings', [ReportController::class, 'bookings'])->name('reports.bookings');
    Route::get('reports/income', [ReportController::class, 'income'])->name('reports.income');
});

require __DIR__.'/auth.php';
