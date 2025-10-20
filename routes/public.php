<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

// Halaman utama (tanpa login)
Route::get('/', [PublicController::class, 'index'])->name('public.home');

// Filter berdasarkan jurusan
Route::get('/jurusan/{slug}', [PublicController::class, 'byDepartment'])->name('public.department');

// Filter berdasarkan ruangan
Route::get('/lab/{id}', [PublicController::class, 'byRoom'])->name('public.room');

// Pencarian jadwal
Route::get('/search', [PublicController::class, 'search'])->name('public.search');
