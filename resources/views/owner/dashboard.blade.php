@extends('layouts.owner')

@section('title', 'Dashboard Owner')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-coffee shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-coffee text-uppercase mb-1">Total Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPesanan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Menu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMenu }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coffee fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPelanggan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-coffee">Ringkasan Status Pesanan</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <span class="text-muted">Diantar</span>
                            <div class="h5 font-weight-bold">{{ $statusSummary['Diantar'] }}</div>
                        </div>
                        <div class="col-6 mb-3">
                            <span class="text-muted">Diproses</span>
                            <div class="h5 font-weight-bold">{{ $statusSummary['Diproses'] }}</div>
                        </div>
                        <div class="col-6">
                            <span class="text-muted">Selesai</span>
                            <div class="h5 font-weight-bold">{{ $statusSummary['Selesai'] }}</div>
                        </div>
                        <div class="col-6">
                            <span class="text-muted">Batal</span>
                            <div class="h5 font-weight-bold">{{ $statusSummary['Batal'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-coffee">Menu Terlaris</h6>
                </div>
                <div class="card-body">
                    <ol class="mb-0 ps-3">
                        @forelse ($menuTerlaris as $item)
                            <li>{{ $item->menu->nama_menu ?? '-' }}</li>
                        @empty
                            <li class="text-muted">Belum ada data</li>
                        @endforelse
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Pesanan Terbaru</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>PELANGGAN</th>
                        <th>MENU</th>
                        <th>TOTAL</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesananTerbaru as $index => $pesanan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pesanan->pelanggan->nama }}</td>
                            <td>{{ $pesanan->pesananDetail->pluck('menu.nama_menu')->implode(', ') }}</td>
                            <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                            <td>{{ $pesanan->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data pesanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection