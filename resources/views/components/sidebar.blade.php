<!-- Sidebar -->
<div class="sidebar" data-background-color="light">
    <div class="sidebar-logo text-center py-3">
        <a href="/dashboard" class="logo d-block">
            <img src="{{ url('') }}/assets/img/logo-removebg-preview.png" alt="Logo SPBE" class="navbar-brand"
                style="max-height: 60px;" />
        </a>
        <div class="mt-2" style="font-weight: bold; font-size: 18px; color: #333;">
            Kota Kendari
        </div>
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
                @if (Auth::user()->role === 'level1')
                    <li class="nav-item {{ Request::is('data-user*') ? 'active' : '' }}">
                        <a href="/data-user">
                            <i class="fas fa-users"></i>
                            <p>Data User</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
