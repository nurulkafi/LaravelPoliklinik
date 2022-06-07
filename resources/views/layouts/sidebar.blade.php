<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('admin/assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">General</li>
                        <li class="sidebar-item @yield('Dashboard')">
                            <a href="{{ url('admin/dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('pendaftaran')">
                            <a href="{{ url('admin/dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Pendaftaran</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Master Data</li>
                        <li class="sidebar-item @yield('pasien')">
                            <a href="{{ url('admin/pasien') }}" class='sidebar-link'>
                                <i class="bi bi-list"></i>
                                <span>Pasien</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('pegawai')">
                            <a href="{{ url('admin/pegawai') }}" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Pegawai</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('poli')">
                            <a href="{{ url('admin/poli') }}" class='sidebar-link'>
                                <i class="bi bi-cart-fill"></i>
                                <span>Poliklinik</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('obat')">
                            <a href="{{ url('admin/obat') }}" class='sidebar-link'>
                                <i class="bi bi-cart-fill"></i>
                                <span>Obat</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('Orders')">
                            <a href="{{ url('admin/order') }}" class='sidebar-link'>
                                <i class="bi bi-cart-fill"></i>
                                <span>Jenis Biaya</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('Orders')">
                            <a href="{{ url('admin/order') }}" class='sidebar-link'>
                                <i class="bi bi-cart-fill"></i>
                                <span>Media Pembayaran</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Dokter</li>
                        <li class="sidebar-item @yield('dokter')">
                            <a href="{{ url('admin/dokter') }}" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Dokter</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('dokter')">
                            <a href="{{ url('admin/dokter') }}" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Jadwal Dokter</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('dokter')">
                            <a href="{{ url('admin/dokter') }}" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Pemeriksaan</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Manajemen Users</li>
                        <li class="sidebar-item @yield('Users')">
                            <a href="{{ url('admin/role') }}" class='sidebar-link'>
                                <i class="bi bi-lock-fill"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('Role')">
                            <a href="{{ url('admin/role') }}" class='sidebar-link'>
                                <i class="bi bi-lock-fill"></i>
                                <span>Role</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ url('/logout') }}" class='sidebar-link'>
                                <i class="bi bi-arrow-left"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
