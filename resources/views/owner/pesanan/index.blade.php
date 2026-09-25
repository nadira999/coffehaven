@extends('layouts.owner')

@section('title', 'Data Pesanan')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pesanan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th>NAMA</th>
                        <th>TOTAL</th>
                        <th width="140">STATUS</th>
                        <th>MENU</th>
                        <th width="150">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesanan as $item)
                        <tr>
                            <td>{{ $pesanan->firstItem() + $loop->index }}</td>
                            <td>{{ $item->pelanggan->nama }}</td>
                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ url('owner/pesanan') }}/{{ $item->id }}/status" method="POST" class="mb-0">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                        <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="Diantar" {{ $item->status == 'Diantar' ? 'selected' : '' }}>Diantar</option>
                                        <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="Batal" {{ $item->status == 'Batal' ? 'selected' : '' }}>Batal</option>
                                    </select>
                                </form>
                            </td>
                            <td>{{ $item->pesananDetail->pluck('menu.nama_menu')->implode(', ') }}</td>
                            <td>
                                <a href="{{ route('owner.pesanan.show', $item->id) }}" class="btn btn-link text-secondary p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>
                                <a href="{{ route('owner.pesanan.cetak', $item->id) }}" target="_blank" class="btn btn-link text-success p-0 mx-2">
                                    <span class="fa fa-print"></span>
                                </a>
                                <a href="#" onclick="actionDestroy('{{ route('owner.pesanan.destroy', $item->id) }}', '{{ $item->status }}')" class="btn btn-link text-danger p-0 mx-2">
                                    <span class="fa fa-trash"></span>
                                </a>
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

    <form action="" id="form-destroy" method="POST">
        @csrf
        @method('DELETE')
    </form>

    @if (Session::has('success'))
    <script>
    Swal.fire({ title: "Berhasil!", text: "{{ Session::get('success') }}", icon: "success", timer: 2000, showConfirmButton: false });
    </script>
    @endif

    @push('scripts')
    <script>
        function actionDestroy(url, status) {
            let teks = "Kamu tidak bisa mengembalikan data yang sudah dihapus!";
            if (status === 'Selesai') {
                teks = "Pesanan ini sudah SELESAI dan mempengaruhi data pendapatan! Yakin ingin menghapus?";
            }
            Swal.fire({
                title: "Apa kamu yakin?",
                text: teks,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-destroy').attr('action', url);
                    $('#form-destroy').submit();
                }
            });p
        }
    </script>
    @endpush
@endsection