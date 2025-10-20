<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ROUTE AUTH
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ROUTE PUBLIC (tanpa login)
require __DIR__ . '/public.php';

// ROUTE ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    require __DIR__ . '/admin.php';
});

// ROUTE PETUGAS
Route::middleware(['auth', 'role:petugas'])->group(function () {
    require __DIR__ . '/petugas.php';
});
