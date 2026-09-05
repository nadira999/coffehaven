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

        Route::get('/pelanggan', [\App\Http\Controllers\Owner\PelangganController::class, 'index'])->name('pelanggan.index');
        Route::get('/pelanggan/{id}', [\App\Http\Controllers\Owner\PelangganController::class, 'show'])->name('pelanggan.show');
        Route::delete('/pelanggan/{id}', [\App\Http\Controllers\Owner\PelangganController::class, 'destroy'])->name('pelanggan.destroy');

        Route::get('/profil', [\App\Http\Controllers\Owner\ProfilController::class, 'edit'])->name('profil.edit');
        Route::put('/profil', [\App\Http\Controllers\Owner\ProfilController::class, 'update'])->name('profil.update');
    });
});

Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/beranda', [\App\Http\Controllers\Public\PublicController::class, 'beranda'])->name('beranda');
    Route::get('/menu', [\App\Http\Controllers\Public\PublicController::class, 'menu'])->name('menu');
    Route::get('/about', [\App\Http\Controllers\Public\PublicController::class, 'about'])->name('about');
    Route::get('/contact', [\App\Http\Controllers\Public\PublicController::class, 'contact'])->name('contact');

    Route::get('/daftar', [\App\Http\Controllers\Pelanggan\AuthController::class, 'showRegister'])->name('register');
    Route::post('/daftar', [\App\Http\Controllers\Pelanggan\AuthController::class, 'register'])->name('register.store');
    Route::get('/login', [\App\Http\Controllers\Pelanggan\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Pelanggan\AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [\App\Http\Controllers\Pelanggan\AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:pelanggan')->group(function () {
        Route::get('/pesanan', [\App\Http\Controllers\Pelanggan\PesananController::class, 'create'])->name('pesanan.create');
        Route::post('/pesanan', [\App\Http\Controllers\Pelanggan\PesananController::class, 'store'])->name('pesanan.store');
        Route::get('/riwayat', [\App\Http\Controllers\Pelanggan\RiwayatController::class, 'index'])->name('riwayat.index');
        Route::get('/riwayat/{id}', [\App\Http\Controllers\Pelanggan\RiwayatController::class, 'show'])->name('riwayat.show');
    });
});