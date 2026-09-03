@extends('layouts.auth')

@section('title', 'Login Pelanggan - The Coffee Haven')

@section('content')
<div class="login-card">
    <div class="login-logo">The Coffee Haven</div>

    <div class="login-greeting">Selamat Datang Kembali! 👋</div>
    <div class="login-subtitle">Login untuk melanjutkan pemesanan</div>

    <form method="POST" action="{{ route('pelanggan.login.submit') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email"
                class="form-control login-input @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                placeholder="Masukkan email Anda">
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password"
                class="form-control login-input @error('password') is-invalid @enderror"
                placeholder="Masukkan password">
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 form-check">
            <input type="checkbox" name="remember" id="remember"
                class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Selalu ingat saya</label>
        </div>

        <button type="submit" class="btn btn-coffee btn-block w-100">Login</button>
    </form>

    <hr>
    <div class="text-center">
        <a class="small" href="{{ route('pelanggan.register') }}">Belum punya akun? Daftar</a>
    </div>
</div>
@endsection