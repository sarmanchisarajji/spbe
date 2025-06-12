<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="{{ url('') }}/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu Utama</h4>
                </li>
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('aspek-indikator/*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts"
                        class="{{ request()->is('aspek-indikator/*') ? '' : 'collapsed' }}"
                        aria-expanded="{{ request()->is('aspek-indikator/*') ? 'true' : 'false' }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Domain Layanan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('aspek-indikator/*') ? 'show' : '' }}" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('aspek-indikator/domain-layanan') ? 'active' : '' }}">
                                <a href="/aspek-indikator/domain-layanan">
                                    <span class="sub-item">Aspek & Indikator</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('Prosescobit*') ? 'active' : '' }}">
                    <a href="/Prosescobit">
                        <i class="fas fa-th-list"></i>
                        <p>Proses COBIT 5</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="">
                        <i class="fas fa-users"></i>
                        <p>Data User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
