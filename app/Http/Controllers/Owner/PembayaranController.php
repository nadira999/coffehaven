<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Menampilkan semua data pembayaran.
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('pesanan.pelanggan')
            ->latest()
            ->paginate(10);

        return view('owner.pembayaran.index', compact('pembayaran'));
    }

    /**
     * Memverifikasi pembayaran (menandai lunas).
     */
    public function verifikasi(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'status' => 'Lunas',
        ]);

        return redirect()
            ->route('owner.pembayaran.index')
            ->with('success', 'Pembayaran berhasil diverifikasi!');
    }

    /**
     * Menandai pembayaran gagal.
     */
    public function tolak(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'status' => 'Gagal',
        ]);

        return redirect()
            ->route('owner.pembayaran.index')
            ->with('success', 'Pembayaran ditandai gagal!');
    }
}