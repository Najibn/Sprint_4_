<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaintenanceRecordController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});



 Route::get('/dashboard', function () {
     return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//breeze profile rouetes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//using resource for routes for CRUD operations.
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('maintenanceRecords', MaintenanceRecordController::class);

// Admin routes


// Customer routes


// Technician routes



require __DIR__.'/auth.php';
