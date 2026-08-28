@extends('layouts.owner')

@section('title', 'Data Pesanan')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Riwayat Pesanan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th>NAMA</th>
                        <th>TOTAL</th>
                        <th>STATUS</th>
                        <th>MENU</th>
                        <th width="180">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesanan as $item)
                        <tr>
                            <td>{{ $pesanan->firstItem() + $loop->index }}</td>
                            <td>{{ $item->pelanggan->nama }}</td>
                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->pesananDetail->pluck('menu.nama_menu')->implode(', ') }}</td>
                            <td>
                                <a href="{{ route('owner.pesanan.show', $item->id) }}" class="btn btn-link p-0 me-2">Detail</a>
                                <a href="#" onclick="ubahStatus('{{ $item->id }}', '{{ $item->status }}')" class="btn btn-link text-warning p-0 me-2">Ubah Status</a>
                                <a href="{{ route('owner.pesanan.cetak', $item->id) }}" target="_blank" class="btn btn-link text-success p-0">Cetak</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data pesanan tidak ditemukan...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {!! $pesanan->links() !!}
        </div>
    </div>

    <form action="" id="form-status" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="status" id="status-input">
    </form>

    @push('scripts')
    <script>
        function ubahStatus(id, currentStatus) {
            Swal.fire({
                title: "Ubah Status Pesanan",
                input: "select",
                inputOptions: {
                    Diproses: "Diproses",
                    Diantar: "Diantar",
                    Selesai: "Selesai",
                    Batal: "Batal"
                },
                inputValue: currentStatus,
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-status').attr('action', '{{ url('owner/pesanan') }}/' + id + '/status');
                    $('#status-input').val(result.value);
                    $('#form-status').submit();
                }
            });
        }
    </script>
    @endpush
@endsection