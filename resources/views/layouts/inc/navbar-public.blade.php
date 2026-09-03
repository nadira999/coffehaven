<div class="navbar-utility">
    <div class="container d-flex justify-content-between align-items-center">
        <small><i class="fas fa-clock mr-1"></i> Buka Setiap Hari 08.00 - 21.00</small>
        <small><i class="fas fa-phone-alt mr-1"></i> +62 812-xxxx-xxxx</small>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-coffee shadow">
    <div class="container">
        <a class="navbar-brand navbar-brand-spaced" href="{{ route('pelanggan.beranda') }}">THE COFFEE HAVEN</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPublic">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarPublic">
            <ul class="navbar-nav mr-auto ml-4">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pelanggan.beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pelanggan.menu') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pelanggan.about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pelanggan.contact') }}">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                @guest('pelanggan')
                    <li class="nav-item">
                        <a class="btn btn-pill-cream btn-sm" href="{{ route('pelanggan.pesanan.create') }}">
                            <i class="fas fa-mug-hot mr-1"></i> Order Now
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-pill-cream btn-sm mr-2" href="{{ route('pelanggan.pesanan.create') }}">
                            <i class="fas fa-mug-hot mr-1"></i> Order Now
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownPelanggan" role="button" data-toggle="dropdown">
                            {{ Auth::guard('pelanggan')->user()->nama }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="dropdownPelanggan">
                            <a class="dropdown-item" href="{{ route('pelanggan.riwayat.index') }}">Riwayat Pemesanan</a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('pelanggan.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>