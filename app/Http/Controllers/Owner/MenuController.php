<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Menampilkan semua data menu.
     */
    public function index()
    {
        $menu = Menu::paginate(10);
        return view('owner.menu.index', compact('menu'));
    }

    /**
     * Menampilkan form tambah menu.
     */
    public function create()
    {
        return view('owner.menu.create');
    }

    /**
     * Menyimpan data menu baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:100',
            'kategori' => 'required|string|max:20',
            'varian' => 'nullable|string|max:20',
            'harga' => 'required|integer|min:0',
            'foto' => 'nullable|image|max:2048'
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('menu', 'public');
        }

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'kategori' => $request->kategori,
            'varian' => $request->varian,
            'harga' => $request->harga,
            'foto' => $fotoPath,
        ]);

        return redirect()
            ->route('owner.menu.index')
            ->with('success', 'Berhasil menambahkan menu baru!');
    }

    /**
     * Menampilkan form edit menu.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('owner.menu.edit', compact('menu'));
    }

    /**
     * Mengubah data menu.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:100',
            'kategori' => 'required|string|max:20',
            'varian' => 'nullable|string|max:20',
            'harga' => 'required|integer|min:0',
            'foto' => 'nullable|image|max:2048'
        ]);

        $menu = Menu::findOrFail($id);

        $fotoPath = $menu->foto;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('menu', 'public');
        }

        $menu->update([
            'nama_menu' => $request->nama_menu,
            'kategori' => $request->kategori,
            'varian' => $request->varian,
            'harga' => $request->harga,
            'foto' => $fotoPath,
        ]);

        return redirect()
            ->route('owner.menu.index')
            ->with('success', 'Berhasil mengubah data menu!');
    }

    /**
     * Menghapus data menu.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()
            ->route('owner.menu.index')
            ->with('success', 'Berhasil menghapus menu!');
    }
}