<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\MaintenanceRecordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Welcome page default
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
require __DIR__.'/auth.php';


// email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


//email verification after user click the link
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard')->with('message', 'Email verified successfully!');
})->middleware(['auth', 'signed'])->name('verification.verify');


// Resend email verification link
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification email sent correctly!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// General dashboard route for all user->role
Route::get('/dashboard', function () {
    $user = Auth::user();
    return redirect()->route($user->role . '.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Profile routes
Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

// Admin routes
Route::middleware('auth', 'verified', 'can:isAdmin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    })->name('dashboard');
    
    Route::resources([
        'users' => UserController::class,
        'products' => ProductController::class,
        'maintenanceRecords' => MaintenanceRecordController::class,
    ]);
});

//customers only routes 
Route::middleware(['auth', 'verified', 'can:isCustomer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/customer/products/{id}', [CustomerController::class, 'viewProduct'])->name('customer.products.view');
    Route::get('/customer/products/{id}/edit', [CustomerController::class, 'editProduct'])->name('customer.products.edit');
    Route::put('/customer/products/{id}', [CustomerController::class, 'updateProduct'])->name('customer.products.update');
});

// Maintenance Records Dashboard for technicians only to view, save and edit 
Route::middleware(['auth', 'verified', 'can:isTechnician'])->group(function () {
    Route::get('/technician/dashboard', [TechnicianController::class, 'dashboard'])->name('technician.dashboard');
    Route::post('/technician/maintenance-records', [TechnicianController::class, 'store'])->name('technician.maintenanceRecords.store');
    Route::get('/technician/maintenance-records/{id}', [TechnicianController::class, 'show'])->name('technician.maintenanceRecords.show');
    Route::get('/technician/maintenance-records/{id}/edit', [TechnicianController::class, 'edit'])->name('technician.maintenanceRecords.edit');
    Route::put('/technician/maintenance-records/{id}', [TechnicianController::class, 'update'])->name('technician.maintenanceRecords.update');
});