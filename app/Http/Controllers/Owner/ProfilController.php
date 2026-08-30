<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Menampilkan form edit profil Owner.
     */
    public function edit()
    {
        $owner = Auth::guard('owner')->user();
        return view('owner.profil.edit', compact('owner'));
    }

    /**
     * Mengubah data profil Owner.
     */
    public function update(Request $request)
    {
        $owner = Auth::guard('owner')->user();

        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:owner,email,' . $owner->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $owner->nama = $request->nama;
        $owner->email = $request->email;

        if ($request->filled('password')) {
            $owner->password = Hash::make($request->password);
        }

        $owner->save();

        return redirect()
            ->route('owner.profil.edit')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}