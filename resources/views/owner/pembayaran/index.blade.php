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
                        <th width="120">AKSI</th>
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
                            <td>{{ $item->status == 'Gagal' ? 'Ditolak' : $item->status }}</td>
                            <td>
                                <a href="#" onclick="actionVerifikasi('{{ route('owner.pembayaran.verifikasi', $item->id) }}')" class="btn btn-link text-success p-0 mx-2">
                                    <span class="fa fa-check"></span>
                                </a>
                                <a href="#" onclick="actionTolak('{{ route('owner.pembayaran.tolak', $item->id) }}')" class="btn btn-link text-danger p-0 mx-2">
                                    <span class="fa fa-times"></span>
                                </a>
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

    <form action="" id="form-verifikasi" method="POST">
        @csrf
        @method('PUT')
    </form>

    <form action="" id="form-tolak" method="POST">
        @csrf
        @method('PUT')
    </form>

    @push('scripts')
    <script>
        function actionVerifikasi(url) {
            Swal.fire({
                title: "Verifikasi Pembayaran?",
                text: "Status pembayaran akan diubah menjadi Lunas.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Ya, Verifikasi!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-verifikasi').attr('action', url);
                    $('#form-verifikasi').submit();
                }
            });
        }

        function actionTolak(url) {
            Swal.fire({
                title: "Tolak Pembayaran?",
                text: "Status pembayaran akan diubah menjadi Ditolak.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Tolak!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-tolak').attr('action', url);
                    $('#form-tolak').submit();
                }
            });
        }
    </script>
    @endpush
@endsection