<ul class="navbar-nav sidebar sidebar-dark accordion bg-gradient-coffee" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('owner.dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-mug-hot"></i>
        </div>
        <div class="sidebar-brand-text mx-3">The Coffee Haven</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->routeIs('owner.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('owner.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('owner.profil.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('owner.profil.edit') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Owner</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('owner.menu.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('owner.menu.index') }}">
            <i class="fas fa-fw fa-mug-saucer"></i>
            <span>Kelola Menu</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('owner.pesanan.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('owner.pesanan.index') }}">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Data Pesanan</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('owner.pembayaran.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('owner.pembayaran.index') }}">
            <i class="fas fa-fw fa-money-check-dollar"></i>
            <span>Data Pembayaran</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('owner.pelanggan.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('owner.pelanggan.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Kelola Pelanggan</span>
        </a>
    </li>

</ul>