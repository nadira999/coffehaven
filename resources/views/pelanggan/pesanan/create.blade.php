@extends('layouts.public')

@section('title', 'Form Pemesanan - The Coffee Haven')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow border-0">
                <div class="card-body p-4 p-md-5">
                    <h4 class="text-coffee font-weight-bold mb-4 text-center">Form Pesanan</h4>

                    <form method="POST" action="{{ route('pelanggan.pesanan.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="menu_id" class="form-label">Pilih Menu</label>
                            <select name="menu_id" id="menu_id"
                                class="form-control login-input @error('menu_id') is-invalid @enderror" onchange="tampilkanInfoMenu()">
                                <option value="">-- Pilih Menu --</option>
                                @foreach ($menu as $item)
                                    <option value="{{ $item->id }}"
                                        data-kategori="{{ $item->kategori }}"
                                        data-varian="{{ $item->varian }}"
                                        {{ old('menu_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_menu }} - Rp {{ number_format($item->harga, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('menu_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="varian" class="form-label">Varian</label>
                                <select name="varian" id="varian"
                                    class="form-control login-input @error('varian') is-invalid @enderror">
                                    <option value="">-</option>
                                </select>
                                @error('varian')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" min="1" value="{{ old('jumlah', 1) }}"
                                    class="form-control login-input @error('jumlah') is-invalid @enderror">
                                @error('jumlah')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" id="kategori_display" class="form-control login-input" readonly placeholder="-">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                                <select name="metode_pembayaran" id="metode_pembayaran"
                                    class="form-control login-input @error('metode_pembayaran') is-invalid @enderror">
                                    <option value="">-- Pilih --</option>
                                    <option value="Transfer Bank" {{ old('metode_pembayaran') == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                                    <option value="QRIS" {{ old('metode_pembayaran') == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                                    <option value="COD" {{ old('metode_pembayaran') == 'COD' ? 'selected' : '' }}>COD</option>
                                </select>
                                @error('metode_pembayaran')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea name="catatan" id="catatan" rows="3"
                                class="form-control login-input @error('catatan') is-invalid @enderror"
                                placeholder="Catatan tambahan (opsional)">{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*"
                                class="form-control @error('bukti_pembayaran') is-invalid @enderror">
                            @error('bukti_pembayaran')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-coffee btn-block w-100">Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function tampilkanInfoMenu() {
        var select = document.getElementById('menu_id');
        var option = select.options[select.selectedIndex];

        document.getElementById('kategori_display').value = option.getAttribute('data-kategori') || '-';

        var varianRaw = option.getAttribute('data-varian');
        var varianSelect = document.getElementById('varian');
        varianSelect.innerHTML = '';

        if (varianRaw) {
            var pilihan = varianRaw.split('/');
            pilihan.forEach(function (v) {
                var opt = document.createElement('option');
                opt.value = v.trim();
                opt.text = v.trim();
                varianSelect.appendChild(opt);
            });
        } else {
            var opt = document.createElement('option');
            opt.value = '';
            opt.text = '-';
            varianSelect.appendChild(opt);
        }
    }
</script>
@endsection