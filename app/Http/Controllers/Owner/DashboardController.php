<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\Pelanggan;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard Owner.
     */
    public function index()
    {
        $totalMenu = Menu::count();
        $totalPesanan = Pesanan::count();
        $totalPelanggan = Pelanggan::count();

        $pesananTerbaru = Pesanan::with('pelanggan')
            ->latest()
            ->take(5)
            ->get();

        return view('owner.dashboard', compact(
            'totalMenu',
            'totalPesanan',
            'totalPelanggan',
            'pesananTerbaru'
        ));
    }
}