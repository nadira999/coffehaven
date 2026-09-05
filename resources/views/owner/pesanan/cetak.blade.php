<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Struk Pesanan #{{ $pesanan->id }}</title>
    <style>
    body {
        font-family: monospace;
        width: 280px;
        margin: 20px auto;
        font-size: 13px;
    }
    .center { text-align: center; }
    .divider { border-top: 1px dashed #000; margin: 8px 0; }
    table { width: 100%; border-collapse: collapse; }
    td { padding: 2px 0; }
    .btn {
        display: inline-block;
        padding: 8px 16px;
        margin-top: 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }
    .btn-print { background: #6f4e37; color: #fff; }
    .btn-back { background: #ccc; color: #000; text-decoration: none; }

    @media print {
        .no-print { display: none; }

        @page {
            size: 80mm auto;
            margin: 0;
        }

        body {
            width: 72mm;
            margin: 0 auto;
            font-size: 11px;
        }
    }
</style>
</head>
<body>
    <div class="center">
        <strong>The Coffee Haven</strong><br>
        Jl. Contoh Alamat No. 1<br>
        Telp: 08xx-xxxx-xxxx
    </div>

    <div class="divider"></div>

    <div>
        No. Pesanan: #{{ $pesanan->id }}<br>
        Nama: {{ $pesanan->pelanggan->nama }}<br>
        Tanggal: {{ $pesanan->created_at->format('d/m/Y H:i') }}<br>
        Status: {{ $pesanan->status }}
    </div>

    <div class="divider"></div>

    <table>
        <thead>
            <tr>
                <td><strong>Item</strong></td>
                <td class="center"><strong>Jml</strong></td>
                <td class="center"><strong>Subtotal</strong></td>
            </tr>
        </thead>
        <tbody>
    @foreach ($pesanan->pesananDetail as $detail)
        <tr>
            <td>{{ $detail->menu->nama_menu }}{{ $detail->varian ? ' (' . $detail->varian . ')' : '' }}</td>
            <td class="center">{{ $detail->jumlah }}</td>
            <td class="center">{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
        </tr>
    @endforeach
</tbody>
    </table>

    <div class="divider"></div>

    <table>
        <tr>
            <td><strong>Total Bayar</strong></td>
            <td class="center"><strong>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <div class="divider"></div>

    <div class="center">
        Terima kasih telah memesan!<br>
        ~ The Coffee Haven ~
    </div>

    <div class="center no-print">
        <button onclick="window.print()" class="btn btn-print">Cetak Struk</button>
        <a href="{{ route('owner.pesanan.index') }}" class="btn btn-back">Kembali</a>
    </div>
</body>
</html>