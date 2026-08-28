@extends('layouts.owner')

@section('title', 'Kelola Menu')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Menu</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('owner.menu.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 align-items-end mb-4">
                @csrf

                <div class="col-md-3">
                    <label for="nama_menu" class="form-label">Nama Menu</label>
                    <input type="text" name="nama_menu" id="nama_menu" value="{{ old('nama_menu') }}"
                        class="form-control @error('nama_menu') is-invalid @enderror">
                    @error('nama_menu')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach (['Kopi', 'Non-Kopi', 'Pastry', 'Camilan'] as $kategori)
                            <option value="{{ $kategori }}" {{ old('kategori') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="varian" class="form-label">Varian</label>
                    <input type="text" name="varian" id="varian" value="{{ old('varian') }}"
                        class="form-control @error('varian') is-invalid @enderror"
                        placeholder="Panas / Dingin">
                    @error('varian')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                    @error('foto')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="harga" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga" id="harga" value="{{ old('harga') }}"
                            class="form-control @error('harga') is-invalid @enderror">
                    </div>
                    @error('harga')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-1">
                    <button type="submit" class="btn btn-coffee w-100">Tambah</button>
                </div>
            </form>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50px">NO</th>
                        <th>NAMA MENU</th>
                        <th>KATEGORI</th>
                        <th>VARIAN</th>
                        <th>FOTO</th>
                        <th>HARGA</th>
                        <th width="150">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menu as $item)
                        <tr>
                            <td>{{ $menu->firstItem() + $loop->index }}</td>
                            <td>{{ $item->nama_menu }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->varian ?? '-' }}</td>
                            <td>
                                @if ($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_menu }}" width="60" class="rounded">
                                @else
                                    -
                                @endif
                            </td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('owner.menu.edit', $item->id) }}" class="btn btn-link p-0 me-2">Edit</a>
                                <a href="#" onclick="actionDestroy('{{ route('owner.menu.destroy', $item->id) }}')" class="btn btn-link text-danger p-0">Hapus</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Data menu tidak ditemukan...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {!! $menu->links() !!}
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