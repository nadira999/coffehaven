@extends('layouts.public')

@section('title', 'Menu - The Coffee Haven')

@section('content')

<div class="hero-coffee d-flex align-items-center py-5">
    <div class="container text-center" style="margin-top: 80px;">
        <p class="font-script text-coffee-dark mb-1" style="font-size: 1.8rem;">Jelajahi Cita Rasa Kami</p>
        <h1 class="font-heading font-weight-bold text-coffee-dark display-4">
            Menu Kami
        </h1>
        <p class="text-coffee-dark">
            Temukan kopi, pastry, dan camilan favoritmu di sini.
        </p>
    </div>
</div>

<div class="container py-5">
    <div class="text-center mb-4">
        <a href="{{ route('pelanggan.menu') }}" class="btn btn-sm {{ !request('kategori') || request('kategori') == 'Semua' ? 'btn-coffee' : 'btn-outline-secondary' }} mr-2">Semua</a>
        <a href="{{ route('pelanggan.menu', ['kategori' => 'Kopi']) }}" class="btn btn-sm {{ request('kategori') == 'Kopi' ? 'btn-coffee' : 'btn-outline-secondary' }} mr-2">Kopi</a>
        <a href="{{ route('pelanggan.menu', ['kategori' => 'Non-Kopi']) }}" class="btn btn-sm {{ request('kategori') == 'Non-Kopi' ? 'btn-coffee' : 'btn-outline-secondary' }} mr-2">Non-Kopi</a>
        <a href="{{ route('pelanggan.menu', ['kategori' => 'Pastry']) }}" class="btn btn-sm {{ request('kategori') == 'Pastry' ? 'btn-coffee' : 'btn-outline-secondary' }} mr-2">Pastry</a>
        <a href="{{ route('pelanggan.menu', ['kategori' => 'Camilan']) }}" class="btn btn-sm {{ request('kategori') == 'Camilan' ? 'btn-coffee' : 'btn-outline-secondary' }}">Camilan</a>
    </div>

    <div class="row">
        @forelse ($menu as $item)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama_menu }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                            <span class="text-muted">[ foto ]</span>
                        </div>
                    @endif
                    <div class="card-body">
                        <h6 class="font-weight-bold mb-1">{{ $item->nama_menu }}</h6>
                        <small class="text-muted d-block mb-1">{{ $item->varian ?? '-' }}</small>
                        <span class="text-coffee font-weight-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">Belum ada menu di kategori ini.</div>
        @endforelse
    </div>
</div>

@endsection