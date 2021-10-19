<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link navbar-primary">
        <img src="{{ $pengaturan->logo != null ? asset('storage/' . $pengaturan->logo) : '/assets/img/logo.svg' }}" alt="AdminLTE Logo" class="brand-image img-circle"
           style="opacity: .8">
        <span class="brand-text text-light">{{ $pengaturan->nama_institusi }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/img/user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">
                    DATA MASTER
                </li>
                <li class="nav-item">
                    <a href="{{ route('kelas.index') }}" class="nav-link {{ request()->routeIs('kelas.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Kelas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rombel.index') }}" class="nav-link {{ request()->routeIs('rombel.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Rombel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('siswa.index') }}" class="nav-link {{ request()->routeIs('siswa.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Siswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mapel.index') }}" class="nav-link {{ request()->routeIs('mapel.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Mata Pelajaran
                        </p>
                    </a>
                </li>

                <li class="nav-header">
                    BANK SOAL
                </li>
                <li class="nav-item">
                    <a href="{{ route('paket-soal.index') }}" class="nav-link {{ request()->routeIs('paket-soal.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Paket Soal
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('soal.index') }}" class="nav-link {{ request()->routeIs('soal.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Manajemen Soal
                        </p>
                    </a>
                </li>

                <li class="nav-header">
                    UJIAN
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Pengaturan Ujian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Daftar Ujian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Ujian Aktif
                            <span class="right badge badge-danger">0</span>
                        </p>
                    </a>
                </li>

                <li class="nav-header">
                    MANAJEMEN APLIKASI
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengaturan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
