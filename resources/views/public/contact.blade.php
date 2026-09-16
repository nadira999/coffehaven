@extends('layouts.public')

@section('title', 'Contact - The Coffee Haven')

@section('content')

<div class="hero-coffee d-flex align-items-center py-5">
    <div class="container text-center" style="margin-top: 80px;">
        <p class="font-script text-coffee-dark mb-1" style="font-size: 3.5rem;">Kami Siap Membantu</p>
        <h1 class="font-heading font-weight-bold text-coffee-dark display-4">
            Hubungi Kami
        </h1>
        <p class="text-coffee-dark">
            Kami siap melayani Anda kapan saja.
        </p>
    </div>
</div>

<div class="container py-5">
    <h4 class="text-coffee font-weight-bold font-heading text-center mb-4">Hubungi Kami</h4>

    <div class="row">
        <div class="col-md-5 mb-4 mb-md-0">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h6 class="font-weight-bold mb-1">Email</h6>
                    <p class="text-muted mb-0">coffeehaven@gmail.com</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h6 class="font-weight-bold mb-1">WhatsApp</h6>
                    <p class="text-muted mb-0">+62 838-9585-8310</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="font-weight-bold mb-1">Alamat</h6>
                    <p class="text-muted mb-0">Jl. Serayu Larangan No. 23</p>
                </div>
            </div>
        </div>

        <div class="col-md-7">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3957.561192686235!2d109.33069597499994!3d-7.290661792716792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMTcnMjYuNCJTIDEwOcKwMTknNTkuOCJF!5e0!3m2!1sen!2sid!4v1788847025180!5m2!1sen!2sid"
        width="100%"
        height="350"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
    </div>
</div>

@endsection