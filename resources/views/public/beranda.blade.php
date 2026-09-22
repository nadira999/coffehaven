@extends('layouts.public')

@section('title', 'Beranda - The Coffee Haven')

@section('content')

<div class="hero-coffee d-flex align-items-center py-5">
    <div class="container text-center" style="margin-top: 80px;">
        <p class="font-script text-coffee-dark mb-1" style="font-size: 1.8rem;">Selamat Datang di Cafe Kami</p>
        <h1 class="font-heading font-weight-bold text-coffee-dark display-4">
            Kopi Nikmat,<br>Momen Berkesan
        </h1>
        <p class="text-coffee-dark mb-4">
            Nikmati racikan kopi autentik, pastry segar, dan suasana hangat.<br>
            Pelarian sempurna harian Anda.
        </p>
    </div>
</div>

<div class="container py-5">
    <h4 class="text-coffee font-weight-bold font-heading text-center mb-2">Kenapa Pilih Kami?</h4>
    <p class="text-center text-muted mb-4">Kami serius soal kualitas, kenyamanan, dan momen berkesan untuk setiap pelanggan.</p>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 text-center">
                <img src="{{ asset('images/kopi berkulitas.jpg') }}" class="card-img-top" alt="Kopi Berkualitas">
                <div class="card-body" style="padding: 0.75rem;">
                    <h6 class="font-weight-bold font-heading mb-2">Kopi Berkualitas</h6>
                    <p class="text-muted small mb-0">Kami memilih biji kopi terbaik dan menyeduhnya dengan sepenuh hati.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 text-center">
                <img src="{{ asset('images/segar lezat.jpg') }}" class="card-img-top" alt="Segar & Lezat">
                <div class="card-body" style="padding: 0.75rem;">
                    <h6 class="font-weight-bold font-heading mb-2">Segar & Lezat</h6>
                    <p class="text-muted small mb-0">Dari minuman sampai pastry, semua dibuat fresh setiap hari.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 text-center">
                <img src="{{ asset('images/suasana (2).jpg') }}" class="card-img-top" alt="Suasana Nyaman">
                <div class="card-body" style="padding: 0.75rem;">
                    <h6 class="font-weight-bold font-heading mb-2">Suasana Nyaman</h6>
                    <p class="text-muted small mb-0">Tempat hangat buat santai, kerja, atau ngobrol bareng teman.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-4">
    <h4 class="text-coffee font-weight-bold font-heading text-center mb-4">Menu Unggulan Kami</h4>

    <div class="row">
        @forelse ($menuUnggulan as $item)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    @if ($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama_menu }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                            <span class="text-muted">[ foto ]</span>
                        </div>
                    @endif
                    <div class="card-body" style="padding: 0.5rem;">
                        <h6 class="font-weight-bold mb-1">{{ $item->nama_menu }}</h6>
                        <small class="text-muted d-block mb-1">{{ $item->varian ?? '-' }}</small>
                        <span class="text-coffee font-weight-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">Belum ada menu tersedia.</div>
        @endforelse
    </div>
</div>

<div class="visit-us-section py-5">
    <div class="container-fluid px-md-5">
        <div class="row align-items-center">
            <div class="col-md-3 mb-4 mb-md-0">
                <h4 class="text-coffee font-weight-bold font-heading text-center mb-2" style="font-size: 2rem;">Visit Us Today</h4>
                <p class="text-muted mb-4" style="font-size: 1.1rem;">Kami dengan senang hati menyambut kamu di The Coffee Haven. Datang untuk kopinya, tinggal untuk suasananya!</p>
                <a href="{{ route('pelanggan.contact') }}" class="btn btn-coffee btn-lg">Cari Lokasi Kami</a>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-4">
                         <img src="{{ asset('images/caffe2.jpg') }}" class="rounded w-100" style="max-height: 460px; object-fit: cover;" alt="Suasana Coffee Haven">
                    </div>
                    <div class="col-4">
                         <img src="{{ asset('images/kopi tuang.jpg') }}" class="rounded w-100" style="max-height: 460px; object-fit: cover;" alt="Suasana Coffee Haven">
                    </div>
                    <div class="col-4">
                         <img src="{{ asset('images/caffe.jpg') }}" class="rounded w-100" style="max-height: 460px; object-fit: cover;" alt="Suasana Coffee Haven">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="jam-operasional text-center py-3">
    <small>Jam Operasional: 08.00 - 21.00</small>
</div>


@endsection