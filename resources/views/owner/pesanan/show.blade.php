@extends('layouts.owner')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pesanan #{{ $pesanan->id }}</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <p class="mb-2"><strong>Nama:</strong><br>{{ $pesanan->pelanggan->nama }}</p>
                    <p class="mb-2"><strong>Status:</strong><br>{{ $pesanan->status }}</p>
                    <p class="mb-0"><strong>Catatan:</strong><br>{{ $pesanan->catatan ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-2"><strong>Tanggal Pesan:</strong><br>{{ $pesanan->created_at->format('d-m-Y H:i') }}</p>
                    <p class="mb-0"><strong>Metode Bayar:</strong><br>{{ $pesanan->pembayaran->metode ?? '-' }}</p>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Varian</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan->pesananDetail as $detail)
                        <tr>
                            <td>{{ $detail->menu->nama_menu }}</td>
                            <td>{{ $detail->menu->varian ?? '-' }}</td>
                            <td>{{ $detail->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('owner.pesanan.index') }}" class="btn btn-coffee">Kembali</a>
                <div class="border rounded p-2 px-3">
                    <strong>Total: Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection