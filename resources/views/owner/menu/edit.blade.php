@extends('layouts.owner')

@section('title', 'Edit Menu')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Menu</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('owner.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nama_menu" class="form-label">Nama Menu<span class="text-danger">*</span></label>
                <input type="text" name="nama_menu" id="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}"
                    class="form-control @error('nama_menu') is-invalid @enderror">
                @error('nama_menu')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="kategori" class="form-label">Kategori<span class="text-danger">*</span></label>
                <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror">
                    @foreach (['Kopi', 'Non-Kopi', 'Pastry', 'Camilan'] as $kategori)
                        <option value="{{ $kategori }}" {{ old('kategori', $menu->kategori) == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                    @endforeach
                </select>
                @error('kategori')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="varian" class="form-label">Varian</label>
                <input type="text" name="varian" id="varian" value="{{ old('varian', $menu->varian) }}"
                    class="form-control @error('varian') is-invalid @enderror"
                    placeholder="Contoh: Panas / Dingin">
                @error('varian')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="harga" class="form-label">Harga<span class="text-danger">*</span></label>
                <input type="number" name="harga" id="harga" value="{{ old('harga', $menu->harga) }}"
                    class="form-control @error('harga') is-invalid @enderror">
                @error('harga')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="foto" class="form-label">Foto Menu</label>
                @if ($menu->foto)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}" width="120" class="rounded">
                    </div>
                @endif
                <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                @error('foto')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-coffee">Simpan</button>
            <a href="{{ route('owner.menu.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection