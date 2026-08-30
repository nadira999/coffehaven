@extends('layouts.owner')

@section('title', 'Data Pembayaran')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pembayaran</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th>PESANAN</th>
                        <th>METODE</th>
                        <th>BUKTI</th>
                        <th>STATUS</th>
                        <th width="150">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pembayaran as $item)
                        <tr>
                            <td>{{ $pembayaran->firstItem() + $loop->index }}</td>
                            <td>#{{ $item->pesanan_id }} - {{ $item->pesanan->pelanggan->nama }}</td>
                            <td>{{ $item->metode }}</td>
                            <td>
                                @if ($item->bukti_foto)
                                    <a href="{{ asset('storage/' . $item->bukti_foto) }}" target="_blank">Lihat Bukti</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <form action="{{ route('owner.pembayaran.verifikasi', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-link text-success p-0 me-2">Verifikasi</button>
                                </form>
                                <form action="{{ route('owner.pembayaran.tolak', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-link text-danger p-0">Tolak</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data pembayaran tidak ditemukan...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {!! $pembayaran->links() !!}
        </div>
    </div>
@endsection