<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\PesananDetail;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard Owner.
     */
    public function index()
    {
        $totalPesanan = Pesanan::count();
        $totalMenu = Menu::count();
        $totalPelanggan = Pelanggan::count();

        $statusSummary = [
            'Diproses' => Pesanan::where('status', 'Diproses')->count(),
            'Diantar' => Pesanan::where('status', 'Diantar')->count(),
            'Selesai' => Pesanan::where('status', 'Selesai')->count(),
            'Batal' => Pesanan::where('status', 'Batal')->count(),
        ];

        $menuTerlaris = PesananDetail::selectRaw('menu_id, SUM(jumlah) as total_terjual')
            ->groupBy('menu_id')
            ->orderByDesc('total_terjual')
            ->with('menu')
            ->take(3)
            ->get();

        $pesananTerbaru = Pesanan::with(['pelanggan', 'pesananDetail.menu'])
            ->latest()
            ->take(5)
            ->get();

        return view('owner.dashboard', compact(
            'totalPesanan',
            'totalMenu',
            'totalPelanggan',
            'statusSummary',
            'menuTerlaris',
            'pesananTerbaru'
        ));
    }
}