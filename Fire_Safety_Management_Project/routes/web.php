<?php

use App\Http\Controllers\MaintenanceRecordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

//laravel default dashboard to show the user list directly
Route::get('/dashboard', function () {
    $users = User::all();
    return view('dashboard', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

//breeze profile routes with Auth
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

require __DIR__ . '/auth.php';
