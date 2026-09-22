@extends('layouts.public')

@section('title', 'About - The Coffee Haven')

@section('content')

<div class="hero-coffee d-flex align-items-center py-5">
    <div class="container text-center" style="margin-top: 80px;">
        <p class="font-script text-coffee-dark mb-1" style="font-size: 1.8rem;">Kenali Kami Lebih Dekat</p>
        <h1 class="font-heading font-weight-bold text-coffee-dark display-4">
            Tentang The Coffee 
        </h1>
        <h1 class="font-heading font-weight-bold text-coffee-dark display-4">
            Haven </h1>
        <p class="text-coffee-dark">
            Kami percaya setiap cangkir punya cerita.
        </p>
    </div>
</div>

<div class="container-fluid px-md-5 py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset('images/about2.jpg') }}" class="rounded w-100" style="max-height: 400px; object-fit: cover;" alt="Tentang The Coffee Haven">
        </div>

        <div class="col-md-6">
            <h4 class="text-coffee font-weight-bold font-heading mb-3" style="font-size: 1.75rem;">Tentang Coffee Kami</h4>
            <p class="text-muted" style="font-size: 1.1rem;">
                The Coffee Haven hadir sebagai tempat singgah bagi para pencinta kopi yang mencari kehangatan
                di tengah kesibukan sehari-hari. Setiap cangkir yang kami sajikan diracik dengan biji kopi
                pilihan dan penuh perhatian, mulai dari proses seduh hingga sajian akhir.
            </p>
            <p class="text-muted mb-0" style="font-size: 1.1rem;">
                Kami ingin menjadi tempat di mana setiap orang merasa nyaman untuk singgah, bekerja,
                atau sekadar menikmati momen bersama secangkir kopi hangat.
            </p>
        </div>
    </div>
</div>

<div class="container py-4">
    <h4 class="text-coffee font-weight-bold font-heading text-center mb-4">Filosofi Kopi Kami</h4>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="font-weight-bold font-heading mb-2">Kualitas</h6>
                    <p class="text-muted small mb-0">Biji Kopi Pilihan</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="font-weight-bold font-heading mb-2">Keahlian</h6>
                    <p class="text-muted small mb-0">Racikan Barista</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="font-weight-bold font-heading mb-2">Kehangatan</h6>
                    <p class="text-muted small mb-0">Suasana Nyaman</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection