@extends('layouts.owner')

@section('title', 'Detail Pelanggan')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pelanggan</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title mb-0">Data Pelanggan</h5>
                </div>

                <div class="card-body">
                    <div class="form-group mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $pelanggan->nama }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ $pelanggan->email }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" value="{{ $pelanggan->no_telepon }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" rows="2" readonly>{{ $pelanggan->alamat }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('owner.pelanggan.index') }}" class="btn btn-secondary">
                        <span class="fa fa-times-circle"></span>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mt-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Riwayat Pemesanan</h5>
        </div>

        <div class="card-body">
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
        </div>
    </div>
@endsection