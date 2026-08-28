<?php

use Illuminate\Support\Facades\Route;

Route::prefix('owner')->name('owner.')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Owner\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Owner\AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [\App\Http\Controllers\Owner\AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:owner')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Owner\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/menu', \App\Http\Controllers\Owner\MenuController::class)->except('show');

        Route::get('/pesanan', [\App\Http\Controllers\Owner\PesananController::class, 'index'])->name('pesanan.index');
        Route::get('/pesanan/{id}', [\App\Http\Controllers\Owner\PesananController::class, 'show'])->name('pesanan.show');
        Route::put('/pesanan/{id}/status', [\App\Http\Controllers\Owner\PesananController::class, 'updateStatus'])->name('pesanan.status');
        Route::get('/pesanan/{id}/cetak', [\App\Http\Controllers\Owner\PesananController::class, 'cetak'])->name('pesanan.cetak');

        Route::get('/pembayaran', [\App\Http\Controllers\Owner\PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::put('/pembayaran/{id}/verifikasi', [\App\Http\Controllers\Owner\PembayaranController::class, 'verifikasi'])->name('pembayaran.verifikasi');
        Route::put('/pembayaran/{id}/tolak', [\App\Http\Controllers\Owner\PembayaranController::class, 'tolak'])->name('pembayaran.tolak');
    });
});