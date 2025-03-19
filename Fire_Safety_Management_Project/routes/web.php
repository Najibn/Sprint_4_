<?php

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\MaintenanceRecordController;


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

//customer
Route::middleware(['auth', 'verified', 'can:isCustomer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/customer/products/{id}', [CustomerController::class, 'viewProduct'])->name('customer.products.view');
    Route::get('/customer/products/{id}/edit', [CustomerController::class, 'editProduct'])->name('customer.products.edit');
    Route::put('/customer/products/{id}', [CustomerController::class, 'updateProduct'])->name('customer.products.update');
});
// Maintenance Records Dashboard for technicians only  to view,save and edit 
Route::middleware(['auth', 'verified', 'can:isTechnician'])->group(function () {
    Route::get('/technician/dashboard', [TechnicianController::class, 'dashboard'])->name('technician.dashboard');
    Route::post('/technician/maintenance-records', [TechnicianController::class, 'store'])->name('technician.maintenanceRecords.store');
    Route::get('/technician/maintenance-records/{id}', [TechnicianController::class, 'show'])->name('technician.maintenanceRecords.show');
    Route::get('/technician/maintenance-records/{id}/edit', [TechnicianController::class, 'edit'])->name('technician.maintenanceRecords.edit');
    Route::put('/technician/maintenance-records/{id}', [TechnicianController::class, 'update'])->name('technician.maintenanceRecords.update');
});


