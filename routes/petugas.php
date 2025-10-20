<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\DashboardController;
use App\Http\Controllers\Petugas\LabScheduleController;

// Dashboard Petugas
Route::get('/petugas/dashboard', [DashboardController::class, 'index'])->name('petugas.dashboard');

// Jadwal Lab
Route::prefix('petugas/schedules')->group(function () {
    Route::get('/', [LabScheduleController::class, 'index'])->name('petugas.schedules.index');
    Route::get('/create', [LabScheduleController::class, 'create'])->name('petugas.schedules.create');
    Route::post('/', [LabScheduleController::class, 'store'])->name('petugas.schedules.store');
    Route::get('/{schedule}/edit', [LabScheduleController::class, 'edit'])->name('petugas.schedules.edit');
    Route::put('/{schedule}', [LabScheduleController::class, 'update'])->name('petugas.schedules.update');
    Route::delete('/{schedule}', [LabScheduleController::class, 'destroy'])->name('petugas.schedules.destroy');
    Route::put('/{schedule}/status', [LabScheduleController::class, 'updateStatus'])->name('petugas.schedules.status');
});
