@extends('layouts.public')

@section('title', 'Riwayat Pemesanan - The Coffee Haven')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <h4 class="text-coffee font-weight-bold mb-4 text-center">Riwayat Pesanan Anda</h4>

            <form method="GET" action="{{ route('pelanggan.riwayat.index') }}" class="d-flex mb-4">
                <input type="text" name="cari" value="{{ request('cari') }}"
                    class="form-control login-input mr-2" placeholder="Cari No. Pesanan...">

                <select name="status" class="form-control login-input" style="max-width: 180px;" onchange="this.form.submit()">
                    <option value="">Filter Status</option>
                    <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Diantar" {{ request('status') == 'Diantar' ? 'selected' : '' }}>Diantar</option>
                    <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Batal" {{ request('status') == 'Batal' ? 'selected' : '' }}>Batal</option>
                </select>
            </form>

            @forelse ($pesanan as $item)
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">Pesanan #{{ str_pad($item->id, 2, '0', STR_PAD_LEFT) }}</h6>
                            <small class="text-muted d-block">Tanggal : {{ $item->created_at->format('d/m/Y H:i') }}</small>
                            <small class="text-muted d-block">Total : Rp {{ number_format($item->total_harga, 0, ',', '.') }}</small>
                            <span class="badge
                                @if($item->status == 'Selesai') badge-success
                                @elseif($item->status == 'Batal') badge-danger
                                @else badge-warning
                                @endif mt-1">
                                {{ $item->status }}
                            </span>
                        </div>
                        <a href="{{ route('pelanggan.riwayat.show', $item->id) }}" class="btn btn-coffee btn-sm">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada riwayat pesanan.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection