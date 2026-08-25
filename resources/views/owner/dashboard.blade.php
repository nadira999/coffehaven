@extends('layouts.owner')

@section('title', 'Dashboard Owner')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-coffee shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-coffee text-uppercase mb-1">Total Menu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMenu }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-mug-saucer fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pesanan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPesanan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-receipt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pelanggan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPelanggan }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header bg-cream">
        <h5 class="card-title mb-0">Pesanan Terbaru</h5>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesananTerbaru as $pesanan)
                    <tr>
                        <td>{{ $pesanan->pelanggan->nama ?? '-' }}</td>
                        <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $pesanan->status }}</td>
                        <td>{{ $pesanan->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada data pesanan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($totalPesanan > 5)
            <div class="text-right mt-2">
                <a href="{{ route('owner.pesanan.index') }}" class="btn btn-sm btn-coffee">
                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection