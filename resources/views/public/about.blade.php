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
    <p class="text-muted" style="font-size: 1.1rem;">
        Selain kopi, kami juga menghadirkan pilihan non-kopi, pastry, dan camilan yang dibuat segar
        setiap harinya, agar setiap pelanggan tetap punya pilihan meski sedang tidak ingin menikmati kopi.
        Bagi kami, kualitas rasa dan kenyamanan pelanggan adalah prioritas utama dalam setiap sajian.
    </p>
    <p class="text-muted mb-0" style="font-size: 1.1rem;">
        Kami ingin menjadi tempat di mana setiap orang merasa nyaman untuk singgah, bekerja,
        atau sekadar menikmati momen bersama secangkir kopi hangat.
    </p>
</div>
    </div>
</div>
@endsection