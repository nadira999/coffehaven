<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    /**
     * Menampilkan daftar riwayat pesanan pelanggan yang login.
     */
    public function index(Request $request)
    {
        $query = Pesanan::with('pesananDetail.menu')
            ->where('pelanggan_id', Auth::guard('pelanggan')->id())
            ->latest();

        if ($request->filled('cari')) {
            $query->where('id', 'like', '%' . $request->cari . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pesanan = $query->get();

        return view('pelanggan.riwayat.index', compact('pesanan'));
    }

    /**
     * Menampilkan detail 1 pesanan milik pelanggan yang login.
     */
    public function show(string $id)
    {
        $pesanan = Pesanan::with(['pelanggan', 'pesananDetail.menu', 'pembayaran'])
            ->where('pelanggan_id', Auth::guard('pelanggan')->id())
            ->findOrFail($id);

        return view('pelanggan.riwayat.show', compact('pesanan'));
    }
}