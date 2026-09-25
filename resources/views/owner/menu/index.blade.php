@extends('layouts.owner')

@section('title', 'Kelola Menu')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Menu</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Data Menu</h5>
            <a href="{{ route('owner.menu.create') }}" class="btn btn-white-coffee">
                <span class="fa fa-plus-circle mr-2"></span>
                <span>Tambah</span>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th>NAMA MENU</th>
                        <th>KATEGORI</th>
                        <th>FOTO</th>
                        <th>HARGA</th>
                        <th width="120">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menu as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_menu }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                @if ($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_menu }}" width="60" class="rounded">
                                @else
                                    -
                                @endif
                            </td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('owner.menu.edit', $item->id) }}" class="btn btn-link p-0 mx-2">
                                    <span class="fa fa-edit"></span>
                                </a>
                                <a href="#" onclick="actionDestroy('{{ route('owner.menu.destroy', $item->id) }}')"
                                    class="btn btn-link text-danger p-0 mx-2">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data menu tidak ditemukan...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <form action="" id="form-destroy" method="POST">
        @csrf
        @method('DELETE')
    </form>

    @push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" />
    @endpush

    @push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('.datatable').dataTable({
    lengthChange: false,
    ordering: false
});

        function actionDestroy(url) {
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Data menu yang dihapus tidak bisa dikembalikan!",
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