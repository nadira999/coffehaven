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
     * Menyimpan pesanan baru (bisa lebih dari 1 menu sekaligus).
     */
    public function store(Request $request)
    {
        $request->validate([
            'pilih' => 'required|array|min:1',
            'pilih.*' => 'exists:menu,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'integer|min:1',
            'catatan' => 'nullable|string',
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'required|image|max:2048',
        ], [
            'pilih.required' => 'Pilih minimal 1 menu terlebih dahulu.',
        ]);

        // Validasi tambahan: menu berkategori Kopi/Non-Kopi wajib pilih varian
        foreach ($request->pilih as $menuId) {
            $menu = Menu::findOrFail($menuId);
            if (in_array($menu->kategori, ['Kopi', 'Non-Kopi'])) {
                $request->validate([
                    "varian.$menuId" => 'required|in:Hot,Ice',
                ], [
                    "varian.$menuId.required" => 'Varian untuk ' . $menu->nama_menu . ' wajib dipilih.',
                ]);
            }
        }

        $pesanan = Pesanan::create([
            'pelanggan_id' => Auth::guard('pelanggan')->id(),
            'status' => 'Diproses',
            'total_harga' => 0,
            'catatan' => $request->catatan,
        ]);

        $totalHarga = 0;

        foreach ($request->pilih as $menuId) {
            $menu = Menu::findOrFail($menuId);
            $jumlah = $request->jumlah[$menuId];
            $adaVarian = in_array($menu->kategori, ['Kopi', 'Non-Kopi']);
            $subtotal = $menu->harga * $jumlah;
            $totalHarga += $subtotal;

            PesananDetail::create([
                'pesanan_id' => $pesanan->id,
                'menu_id' => $menu->id,
                'varian' => $adaVarian ? $request->varian[$menuId] : null,
                'jumlah' => $jumlah,
                'subtotal' => $subtotal,
            ]);
        }

        $pesanan->update(['total_harga' => $totalHarga]);

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