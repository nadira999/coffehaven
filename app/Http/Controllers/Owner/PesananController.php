<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Menampilkan semua data pesanan.
     */
    public function index()
    {
        $pesanan = Pesanan::with(['pelanggan', 'pesananDetail.menu'])
            ->latest()
            ->paginate(10);

        return view('owner.pesanan.index', compact('pesanan'));
    }

    /**
     * Menampilkan detail pesanan.
     */
    public function show(string $id)
    {
        $pesanan = Pesanan::with(['pelanggan', 'pesananDetail.menu', 'pembayaran'])
            ->findOrFail($id);

        return view('owner.pesanan.show', compact('pesanan'));
    }

    /**
     * Mengubah status pesanan.
     */
    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:Diproses,Diantar,Selesai,Batal',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('owner.pesanan.index')
            ->with('success', 'Status pesanan berhasil diubah!');
    }

    /**
     * Menampilkan struk pesanan untuk dicetak.
     */
    public function cetak(string $id)
    {
        $pesanan = Pesanan::with(['pelanggan', 'pesananDetail.menu'])
            ->findOrFail($id);

        return view('owner.pesanan.cetak', compact('pesanan'));
    }
}