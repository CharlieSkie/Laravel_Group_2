<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

// ✅ Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// ✅ Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Food & Menu Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
    Route::get('/foods/{id}', [FoodController::class, 'show'])->name('foods.show');

    // ✅ Reserve a specific food item
    Route::get('/reserve/{id}', [ReservationController::class, 'create'])->name('reserve.table');

    // ✅ Menu List Dashboard (separate from normal dashboard)
    Route::get('/menu', [FoodController::class, 'menu'])->name('menu'); // 👈 Use FoodController@menu instead of @index
});

// ✅ Reservation Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
});

require __DIR__ . '/auth.php';
