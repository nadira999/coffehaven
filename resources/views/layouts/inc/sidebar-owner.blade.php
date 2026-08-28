<ul class="navbar-nav bg-gradient-coffee sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('owner.dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-mug-hot"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Coffee Haven</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->routeIs('owner.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('owner.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('owner.menu.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('owner.menu.index') }}">
            <i class="fas fa-fw fa-coffee"></i>
            <span>Kelola Menu</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('owner.pesanan.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('owner.pesanan.index') }}">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Data Pesanan</span>
    </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>Data Pembayaran</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Data Owner</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pelanggan</span>
        </a>
    </li>

</ul>