@extends('layouts.owner')

@section('title', 'Data Pelanggan')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pelanggan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th>NAMA</th>
                        <th>EMAIL</th>
                        <th>NO. TELP</th>
                        <th>ALAMAT</th>
                        <th width="150">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelanggan as $item)
                        <tr>
                            <td>{{ $pelanggan->firstItem() + $loop->index }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->no_telepon }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ route('owner.pelanggan.show', $item->id) }}" class="btn btn-link p-0 me-2">Detail</a>
                                <a href="#" onclick="actionDestroy('{{ route('owner.pelanggan.destroy', $item->id) }}')" class="btn btn-link text-danger p-0">Hapus</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data pelanggan tidak ditemukan...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {!! $pelanggan->links() !!}
        </div>
    </div>

    <form action="" id="form-destroy" method="POST">
        @csrf
        @method('DELETE')
    </form>

    @push('scripts')
    <script>
        function actionDestroy(url) {
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Data pelanggan yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-destroy').attr('action', url);
                    $('#form-destroy').submit();
                }
            });
        }
    </script>
    @endpush
@endsection