<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Menampilkan halaman form pemesanan.
     */
    public function create()
    {
        $menu = Menu::all();

        return view('pelanggan.pesanan.create', compact('menu'));
    }

    /**
     * Menyimpan pesanan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'varian' => 'nullable|string|max:20',
            'jumlah' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'required|image|max:2048',
        ]);

        $menu = Menu::findOrFail($request->menu_id);
        $subtotal = $menu->harga * $request->jumlah;

        $pesanan = Pesanan::create([
            'pelanggan_id' => Auth::guard('pelanggan')->id(),
            'status' => 'Diproses',
            'total_harga' => $subtotal,
            'catatan' => $request->catatan,
        ]);

        PesananDetail::create([
            'pesanan_id' => $pesanan->id,
            'menu_id' => $menu->id,
            'varian' => $request->varian,
            'jumlah' => $request->jumlah,
            'subtotal' => $subtotal,
        ]);

        $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        Pembayaran::create([
            'pesanan_id' => $pesanan->id,
            'metode' => $request->metode_pembayaran,
            'bukti_foto' => $buktiPath,
            'status' => 'Pending',
        ]);

        return redirect()->route('pelanggan.riwayat.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}