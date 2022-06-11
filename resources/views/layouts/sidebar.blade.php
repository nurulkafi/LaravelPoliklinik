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
                            <a href="{{ url('admin/pendaftaran') }}" class='sidebar-link'>
                                <i class="bi bi-list-check"></i>
                                <span>Pendaftaran</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Master Data</li>
                        <li class="sidebar-item @yield('pasien')">
                            <a href="{{ url('admin/pasien') }}" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Pasien</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('pegawai')">
                            <a href="{{ url('admin/pegawai') }}" class='sidebar-link'>
                                <i class="bi bi-person-badge"></i>
                                <span>Pegawai</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('poli')">
                            <a href="{{ url('admin/poli') }}" class='sidebar-link'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                                    <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                                    <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                                  </svg>
                                <span>Poliklinik</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('obat')">
                            <a href="{{ url('admin/obat') }}" class='sidebar-link'>
                                <i class="bi bi-droplet"></i>
                                <span>Obat</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('jenis_biaya')">
                            <a href="{{ url('admin/jenis_biaya') }}" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Jenis Biaya</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('media_pembayaran')">
                            <a href="{{ url('admin/media_pembayaran') }}" class='sidebar-link'>
                                <i class="bi bi-wallet2"></i>
                                <span>Media Pembayaran</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Dokter</li>
                        <li class="sidebar-item @yield('dokter')">
                            <a href="{{ url('admin/dokter') }}" class='sidebar-link'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                    <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                    <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z"/>
                                  </svg>
                                <span>Dokter</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('jadwal_dokter')">
                            <a href="{{ url('admin/jadwal_dokter') }}" class='sidebar-link'>
                                <i class="bi bi-calendar-check"></i>
                                <span>Jadwal Dokter</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('pemeriksaan')">
                            <a href="{{ url('admin/pemeriksaan') }}" class='sidebar-link'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Zm8.252-6.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
                                  </svg>
                                <span>Pemeriksaan</span>
                            </a>
                        </li>
                        <li class="sidebar-title">Manajemen Users</li>
                        <li class="sidebar-item @yield('Users')">
                            <a href="{{ url('admin/role') }}" class='sidebar-link'>
                                <i class="bi bi-person-circle"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item @yield('Role')">
                            <a href="{{ url('admin/role') }}" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
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
