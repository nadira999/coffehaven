<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Menampilkan semua data pelanggan.
     */
    public function index()
    {
        $pelanggan = Pelanggan::paginate(10);
        return view('owner.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Menampilkan detail pelanggan beserta riwayat pemesanan.
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::with(['pesanan.pesananDetail.menu'])
            ->findOrFail($id);

        return view('owner.pelanggan.show', compact('pelanggan'));
    }

    /**
     * Menghapus data pelanggan.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()
            ->route('owner.pelanggan.index')
            ->with('success', 'Berhasil menghapus data pelanggan!');
    }
}