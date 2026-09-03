<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('pelanggan.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:pelanggan,email',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('pelanggan.login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function showLogin()
    {
        return view('pelanggan.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('pelanggan')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('pelanggan.pesanan.create')->with('success', 'Login berhasil!');
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pelanggan.login')->with('success', 'Berhasil logout.');
    }
}