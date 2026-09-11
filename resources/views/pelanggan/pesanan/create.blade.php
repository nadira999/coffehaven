@extends('layouts.public')

@section('title', 'Form Pemesanan - The Coffee Haven')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-body p-4 p-md-5">
                    <h4 class="text-coffee font-weight-bold mb-4 text-center">Form Pesanan</h4>

                    <form method="POST" action="{{ route('pelanggan.pesanan.store') }}" enctype="multipart/form-data">
                        @csrf

                        <label class="form-label">Pilih Menu</label>
                        @error('pilih')
                            <div class="text-danger small mb-2">{{ $message }}</div>
                        @enderror

                        <div id="accordionMenu" class="mb-4">
                            @foreach ($menu->groupBy('kategori') as $kategori => $items)
                                <div class="card">
                                    <div class="card-header p-0" id="heading{{ $loop->index }}">
                                        <button class="btn btn-block text-left text-coffee font-weight-bold py-3" type="button"
                                            data-toggle="collapse" data-target="#collapse{{ $loop->index }}"
                                            aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                                            {{ $kategori }}
                                        </button>
                                    </div>
                                    <div id="collapse{{ $loop->index }}" class="collapse"
                                        aria-labelledby="heading{{ $loop->index }}" data-parent="#accordionMenu">
                                        <div class="card-body">
                                            @foreach ($items as $item)
                                                <div class="border rounded p-3 mb-2">
                                                    <div class="row align-items-center g-2">
                                                        <div class="col-md-5">
                                                            <div class="form-check">
                                                                <input type="checkbox" name="pilih[]" value="{{ $item->id }}"
                                                                    id="pilih_{{ $item->id }}" class="form-check-input"
                                                                    data-harga="{{ $item->harga }}"
                                                                    onchange="toggleItem({{ $item->id }})">
                                                                <label class="form-check-label" for="pilih_{{ $item->id }}">
                                                                    {{ $item->nama_menu }} - Rp {{ number_format($item->harga, 0, ',', '.') }}
                                                                </label>
                                                            </div>
                                                        </div>

                                                        @if (in_array($item->kategori, ['Kopi', 'Non-Kopi']))
                                                            <div class="col-md-3">
                                                                <select name="varian[{{ $item->id }}]" id="varian_{{ $item->id }}"
                                                                    class="form-select form-select-sm @error('varian.' . $item->id) is-invalid @enderror" disabled>
                                                                    <option value="Hot">Hot</option>
                                                                    <option value="Ice">Ice</option>
                                                                </select>
                                                                @error('varian.' . $item->id)
                                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        @else
                                                            <div class="col-md-3"></div>
                                                        @endif

                                                        <div class="col-md-4">
                                                            <input type="number" name="jumlah[{{ $item->id }}]" id="jumlah_{{ $item->id }}"
                                                                class="form-control form-control-sm" value="1" min="1" disabled
                                                                onchange="hitungTotal()">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-between align-items-center my-4 p-3 rounded" style="background-color: var(--cream-dark);">
                            <strong class="text-coffee-dark">Total Harga</strong>
                            <strong class="text-coffee-dark" id="total_harga_display">Rp 0</strong>
                        </div>

                        <div class="mb-3">
                            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                            <select name="metode_pembayaran" id="metode_pembayaran"
                                class="form-select login-input @error('metode_pembayaran') is-invalid @enderror">
                                <option value="">-- Pilih --</option>
                                <option value="Transfer Bank" {{ old('metode_pembayaran') == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                                <option value="QRIS" {{ old('metode_pembayaran') == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                                <option value="COD" {{ old('metode_pembayaran') == 'COD' ? 'selected' : '' }}>COD</option>
                            </select>
                            @error('metode_pembayaran')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
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
    function toggleItem(id) {
        var checkbox = document.getElementById('pilih_' + id);
        var jumlah = document.getElementById('jumlah_' + id);
        var varian = document.getElementById('varian_' + id);

        jumlah.disabled = !checkbox.checked;
        if (varian) {
            varian.disabled = !checkbox.checked;
        }

        hitungTotal();
    }

    function hitungTotal() {
        var checkboxes = document.querySelectorAll('.form-check-input:checked');
        var total = 0;

        checkboxes.forEach(function (checkbox) {
            var harga = parseInt(checkbox.getAttribute('data-harga'));
            var jumlah = parseInt(document.getElementById('jumlah_' + checkbox.value).value) || 0;
            total += harga * jumlah;
        });

        document.getElementById('total_harga_display').innerText =
            'Rp ' + total.toLocaleString('id-ID');
    }
</script>
@endsection