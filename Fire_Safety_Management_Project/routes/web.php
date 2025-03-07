<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//profile rouetes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//for the users specific to roles 
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
    
    Route::post('/admin/users', [AdminController::class, 'createUser'])
        ->name('admin.users.store');
    
    Route::post('/admin/assign/product', [AdminController::class, 'assignProduct'])
        ->name('admin.assign.product');
});

require __DIR__.'/auth.php';
