<?php

use App\Http\Controllers\MaintenanceRecordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth; 


// Welcome page default
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
require __DIR__.'/auth.php';

//redirection  Dashboards for all 3 users (role)
Route::get('/admin/dashboard', function () {
    $users = User::all();
    return view('admin.dashboard', compact('users'));
})->name('admin.dashboard')->middleware('can:isAdmin');

Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');
})->name('customer.dashboard')->middleware('can:isCustomer');

Route::get('/technician/dashboard', function () {
    return view('technician.dashboard');
})->name('technician.dashboard')->middleware('can:isTechnician');

// Profile routes
Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

// Admin routes
Route::middleware('can:isAdmin')->prefix('admin')->name('admin.')->group(function () {
    Route::resources([
        'users' => UserController::class,
        'products' => ProductController::class,
        'maintenanceRecords' => MaintenanceRecordController::class,
    ]);
});

// Customer routes
Route::middleware(['auth', 'verified', 'can:isCustomer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
    Route::get('/customer/products/{product}', [CustomerController::class, 'showProductDetails'])->name('customer.products.details');
    Route::post('/customer/products/{product}/add', [CustomerController::class, 'addProduct'])->name('customer.products.add');
});