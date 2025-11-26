<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserTrackingController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\KurirProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

// Route::get('/dashboard', [RedirectController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
    
// // Route setelah login (redirect otomatis ke dashboard sesuai role)
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// ==================== USER ROUTES ====================
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    //Profile
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show'); // Lihat profil
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit'); // Edit profil
    Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update'); // Simpan perubahan
    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    //Tracking
    Route::get('/tracking', [UserTrackingController::class, 'index'])->name('tracking.index');
    Route::get('/tracking/{id}', [UserTrackingController::class, 'show'])->name('tracking.show');
});

// ==================== ADMIN ROUTES ====================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Kelola Orders
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{id}', [AdminController::class, 'show'])->name('orders.show');
    Route::post('/orders/{id}/assign-kurir', [AdminController::class, 'assignKurir'])->name('orders.assign');
    Route::post('/orders/{id}/update-status', [AdminController::class, 'updateStatus'])->name('orders.update-status');

    // Kelola user
    Route::get('/users', [AdminController::class, 'listUsers'])->name('users.index');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');
    Route::patch('/users/{id}/toggle-status', [AdminController::class, 'toggleUserStatus'])->name('users.toggle-status');
    Route::patch('/users/{id}/toggle', [AdminController::class, 'toggleUserStatus'])->name('users.toggle');

    // Kelola Kurir
    Route::get('/kurirs', [AdminController::class, 'listKurirs'])->name('kurirs.index');
    Route::get('/kurirs/create', [AdminController::class, 'createKurir'])->name('kurirs.create');
    Route::post('/kurirs', [AdminController::class, 'storeKurir'])->name('kurirs.store');
    Route::delete('/kurirs/{id}', [AdminController::class, 'deleteKurir'])->name('kurirs.delete');
    Route::patch('/kurirs/{id}/toggle', [AdminController::class, 'toggleKurirStatus'])->name('kurirs.toggle');

    // Opsional: Aktifkan/nonaktifkan
    Route::patch('/kurirs/{id}/toggle-status', [AdminController::class, 'toggleKurirStatus'])->name('kurirs.toggle-status');

    //Profile Routes untuk Admin
    Route::get('/profile', [AdminProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
});

// ==================== KURIR ROUTES ====================
Route::middleware(['auth', 'role:kurir'])->prefix('kurir')->name('kurir.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [KurirController::class, 'index'])->name('dashboard');
    Route::get('/orders', [KurirController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{id}', [KurirController::class, 'show'])->name('orders.show');
    Route::post('/orders/{id}/update-status', [KurirController::class, 'updateStatus'])->name('orders.update-status');
    Route::get('/profile', [KurirProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [KurirProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [KurirProfileController::class, 'update'])->name('profile.update');
});

// Auth routes (login, register, dll)
require __DIR__.'/auth.php';
require __DIR__.'/profile.php';