<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CVController;

// Public CV View
Route::get('/', [CVController::class, 'show'])->name('home');
Route::get('/cv/{id?}', [CVController::class, 'show'])->name('cv.show');

// Admin Panel Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // 3 Tabel CRUD
    Route::resource('biodata', BiodataController::class);
    Route::resource('pendidikan', PendidikanController::class);
    Route::resource('pengalaman', PengalamanController::class);
});
