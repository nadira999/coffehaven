@extends('layouts.owner')

@section('title', 'Detail Pelanggan')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pelanggan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <p class="mb-2"><strong>Nama:</strong><br>{{ $pelanggan->nama }}</p>
                    <p class="mb-0"><strong>Email:</strong><br>{{ $pelanggan->email }}</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-2"><strong>No. Telepon:</strong><br>{{ $pelanggan->no_telepon }}</p>
                    <p class="mb-0"><strong>Alamat:</strong><br>{{ $pelanggan->alamat }}</p>
                </div>
            </div>

            <h6 class="font-weight-bold text-coffee mb-3">Riwayat Pemesanan</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Menu</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelanggan->pesanan as $item)
                        <tr>
                            <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            <td>{{ $item->pesananDetail->pluck('menu.nama_menu')->implode(', ') }}</td>
                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada riwayat pemesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <a href="{{ route('owner.pelanggan.index') }}" class="btn btn-coffee mt-3">Kembali</a>
        </div>
    </div>
@endsection