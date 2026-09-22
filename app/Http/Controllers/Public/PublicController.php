<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Menampilkan halaman Beranda.
     */
    public function beranda()
    {
        $menuUnggulan = Menu::whereIn('nama_menu', [
            'Jamur Krispi',
            'Mix Platter',
            'Croissant Cheese',
            'Cireng',
        ])->get();

        return view('public.beranda', compact('menuUnggulan'));
    }

    /**
     * Menampilkan halaman Menu publik.
     */
    public function menu(Request $request)
    {
        $query = Menu::query();

        if ($request->filled('kategori') && $request->kategori != 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        $menu = $query->get();

        return view('public.menu', compact('menu'));
    }

    /**
     * Menampilkan halaman About.
     */
    public function about()
    {
        return view('public.about');
    }

    /**
     * Menampilkan halaman Contact.
     */
    public function contact()
    {
        return view('public.contact');
    }
}