<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Carbon\Carbon;

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

        $pesananTerbaru = Pesanan::with(['pelanggan', 'pesananDetail.menu'])
            ->latest()
            ->take(5)
            ->get();

        // Data grafik pendapatan 6 bulan terakhir (hanya pesanan yang pembayarannya Lunas)
        $labelBulan = [];
        $dataPendapatan = [];

        for ($i = 5; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i);

            $totalBulan = Pesanan::whereHas('pembayaran', function ($query) {
                    $query->where('status', 'Lunas');
                })
                ->whereYear('created_at', $bulan->year)
                ->whereMonth('created_at', $bulan->month)
                ->sum('total_harga');

            $labelBulan[] = $bulan->isoFormat('MMMM');
            $dataPendapatan[] = $totalBulan;
        }

        return view('owner.dashboard', compact(
            'totalPesanan',
            'totalMenu',
            'totalPelanggan',
            'pesananTerbaru',
            'labelBulan',
            'dataPendapatan'
        ));
    }
}