@extends('layouts.owner')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pesanan #{{ $pesanan->id }}</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="card-title mb-0">Data Pesanan</h5>
                </div>

                <div class="card-body">
                    <div class="form-group mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" value="{{ $pesanan->pelanggan->nama }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" rows="2" readonly>{{ $pesanan->pelanggan->alamat }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" value="{{ $pesanan->pelanggan->no_telepon }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" value="{{ $pesanan->status }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Tanggal Pesan</label>
                        <input type="text" class="form-control" value="{{ $pesanan->created_at->format('d-m-Y H:i') }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Metode Bayar</label>
                        <input type="text" class="form-control" value="{{ $pesanan->pembayaran->metode ?? '-' }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Catatan</label>
                        <textarea class="form-control" rows="2" readonly>{{ $pesanan->catatan ?? '-' }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('owner.pesanan.index') }}" class="btn btn-secondary">
                        <span class="fa fa-times-circle"></span>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mt-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Rincian Pesanan</h5>
        </div>

        <div class="card-body">
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
                            <td>{{ $detail->varian ?? '-' }}</td>
                            <td>{{ $detail->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                <div class="border rounded p-2 px-3">
                    <strong>Total: Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection