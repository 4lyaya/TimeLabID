<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\LabScheduleController;
use App\Http\Controllers\Admin\UserController;

// Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Department
Route::get('/admin/departments', [DepartmentController::class, 'index'])->name('admin.departments.index');
Route::get('/admin/departments/create', [DepartmentController::class, 'create'])->name('admin.departments.create');
Route::post('/admin/departments', [DepartmentController::class, 'store'])->name('admin.departments.store');
Route::get('/admin/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('admin.departments.edit');
Route::put('/admin/departments/{department}', [DepartmentController::class, 'update'])->name('admin.departments.update');
Route::delete('/admin/departments/{department}', [DepartmentController::class, 'destroy'])->name('admin.departments.destroy');

// Room
Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
Route::post('/admin/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');
Route::get('/admin/rooms/{room}/edit', [RoomController::class, 'edit'])->name('admin.rooms.edit');
Route::put('/admin/rooms/{room}', [RoomController::class, 'update'])->name('admin.rooms.update');
Route::delete('/admin/rooms/{room}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');

// Activity
Route::get('/admin/activities', [ActivityController::class, 'index'])->name('admin.activities.index');
Route::get('/admin/activities/create', [ActivityController::class, 'create'])->name('admin.activities.create');
Route::post('/admin/activities', [ActivityController::class, 'store'])->name('admin.activities.store');
Route::get('/admin/activities/{activity}/edit', [ActivityController::class, 'edit'])->name('admin.activities.edit');
Route::put('/admin/activities/{activity}', [ActivityController::class, 'update'])->name('admin.activities.update');
Route::delete('/admin/activities/{activity}', [ActivityController::class, 'destroy'])->name('admin.activities.destroy');

// Lab Schedule
Route::get('/admin/schedules', [LabScheduleController::class, 'index'])->name('admin.schedules.index');
Route::get('/admin/schedules/create', [LabScheduleController::class, 'create'])->name('admin.schedules.create');
Route::post('/admin/schedules', [LabScheduleController::class, 'store'])->name('admin.schedules.store');
Route::delete('/admin/schedules/{schedule}', [LabScheduleController::class, 'destroy'])->name('admin.schedules.destroy');

// User Management
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
