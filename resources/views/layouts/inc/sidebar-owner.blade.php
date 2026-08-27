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

</ul>