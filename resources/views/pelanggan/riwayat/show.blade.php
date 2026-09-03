@extends('layouts.public')

@section('title', 'Detail Pesanan - The Coffee Haven')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h4 class="text-coffee font-weight-bold mb-4 text-center">
                        Detail Pesanan #{{ str_pad($pesanan->id, 2, '0', STR_PAD_LEFT) }}
                    </h4>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted">Informasi Pemesanan</h6>
                            <p class="mb-1">Nama : {{ $pesanan->pelanggan->nama }}</p>
                            <p class="mb-1">No. Telp : {{ $pesanan->pelanggan->no_telepon }}</p>
                            <p class="mb-1">Alamat : {{ $pesanan->pelanggan->alamat }}</p>
                        </div>

                        <div class="col-md-6">
                            <h6 class="text-muted">Status & Pembayaran</h6>
                            <p class="mb-1">Metode : {{ $pesanan->pembayaran->metode ?? '-' }}</p>
                            <p class="mb-1">Catatan : {{ $pesanan->catatan ?? '-' }}</p>
                            <p class="mb-1">Status : {{ $pesanan->status }}</p>
                        </div>
                    </div>

                    <h6 class="text-muted mb-2">Daftar Pesanan</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Menu</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan->pesananDetail as $detail)
                                <tr>
                                    <td>{{ $detail->menu->nama_menu }}</td>
                                    <td>{{ $detail->jumlah }}</td>
                                    <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-right mb-4">
                        <h5>Total : Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</h5>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('pelanggan.riwayat.index') }}" class="btn btn-coffee">
                            Kembali ke Riwayat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection