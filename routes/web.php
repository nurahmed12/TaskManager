<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class)->except('show');
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    // ... existing routes

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});