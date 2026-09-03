@extends('layouts.auth')

@section('title', 'Daftar Pelanggan - The Coffee Haven')

@section('content')
<div class="login-card" style="max-width: 480px;">
    <div class="login-logo">The Coffee Haven</div>

    <div class="login-greeting">Selamat Datang! 👋</div>
    <div class="login-subtitle">Buat akun untuk mulai memesan</div>

    <form method="POST" action="{{ route('pelanggan.register.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" id="nama"
                class="form-control login-input @error('nama') is-invalid @enderror"
                value="{{ old('nama') }}"
                placeholder="Masukkan nama lengkap">
            @error('nama')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control login-input @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email">
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon"
                    class="form-control login-input @error('no_telepon') is-invalid @enderror"
                    value="{{ old('no_telepon') }}"
                    placeholder="Masukkan nomor telepon">
                @error('no_telepon')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3"
                class="form-control login-input @error('alamat') is-invalid @enderror"
                placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password"
                class="form-control login-input @error('password') is-invalid @enderror"
                placeholder="Masukkan password">
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-coffee btn-block w-100">Daftar</button>
    </form>

    <hr>
    <div class="text-center">
        <a class="small" href="{{ route('pelanggan.login') }}">Sudah punya akun? Login di sini</a>
    </div>
</div>
@endsection