<?php

use Illuminate\Support\Facades\Route;

Route::prefix('owner')->name('owner.')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Owner\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Owner\AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [\App\Http\Controllers\Owner\AuthController::class, 'logout'])->name('logout');
Route::middleware('auth:owner')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Owner\DashboardController::class, 'index'])->name('dashboard');
});
});