<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\AuthController as OwnerAuthController;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;
use App\Http\Controllers\Owner\ProfilController as OwnerProfilController;
use App\Http\Controllers\Owner\MenuController as OwnerMenuController;
use App\Http\Controllers\Owner\PesananController as OwnerPesananController;
use App\Http\Controllers\Owner\PembayaranController as OwnerPembayaranController;
use App\Http\Controllers\Owner\PelangganController as OwnerPelangganController;

Route::prefix('owner')->name('owner.')->group(function () {

    // Login / Logout
    Route::get('/login', [OwnerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [OwnerAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [OwnerAuthController::class, 'logout'])->name('logout');

    // Semua route di bawah ini wajib login sebagai Owner
    Route::middleware('auth:owner')->group(function () {

        Route::get('/dashboard', [OwnerDashboardController::class, 'index'])->name('dashboard');

        Route::get('/profil', [OwnerProfilController::class, 'edit'])->name('profil.edit');
        Route::put('/profil', [OwnerProfilController::class, 'update'])->name('profil.update');

        Route::resource('/menu', OwnerMenuController::class);

        Route::resource('/pesanan', OwnerPesananController::class)->only(['index', 'show']);
        Route::put('/pesanan/{id}/status', [OwnerPesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
        Route::get('/pesanan/{id}/cetak', [OwnerPesananController::class, 'cetak'])->name('pesanan.cetak');

        Route::resource('/pembayaran', OwnerPembayaranController::class)->only(['index', 'show']);
        Route::put('/pembayaran/{id}/verifikasi', [OwnerPembayaranController::class, 'verifikasi'])->name('pembayaran.verifikasi');

        Route::resource('/pelanggan', OwnerPelangganController::class)->only(['index', 'show', 'destroy']);

    });

});

Route::get('/', function () {
    return view('welcome');
});
