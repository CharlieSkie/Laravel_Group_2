<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodController;

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
    Route::get('/reserve/{id}', function ($id) {
        return view('reserve', ['food_id' => $id]);
    })->name('reserve.table');

    // 👇 Added this line (so your floating button link "menu" will work)
    Route::get('/menu', [FoodController::class, 'index'])->name('menu');
});

require __DIR__.'/auth.php';
