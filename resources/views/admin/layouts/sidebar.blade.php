<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar bg-dark">
        <a class="sidebar-brand" href="{{ route('homeadmin') }}">
            <h4 class="text-white text-center fw-bold">Selamat Datang</h4>
            <span class="align-middle">{{ Auth::user()->name }}</span>
        </a>
        <ul class="sidebar-nav">
            {{-- Dashboard --}}
            <li class="sidebar-item {{ request()->routeIs('homeadmin') ? 'active' : '' }}">
                <a href="{{ route('homeadmin') }}" class="sidebar-link">
                    <i class="fa-solid fa-book-open"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            {{-- Kondisi berdasarkan level pengguna --}}
            @if (Auth::check() && Auth::user()->level === 'user')
                {{-- Sidebar untuk Admin --}}
                <li class="sidebar-item {{ request()->routeIs('pengaduan.index') ? 'active' : '' }}">
                    <a href="{{ route('pengaduan.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-envelope"></i>
                        <span class="align-middle">Masuk Pengaduan</span>
                    </a>
                </li>
            @elseif (Auth::check() && Auth::user()->level === 'admin')
                {{-- Sidebar untuk Admin --}}
                <li class="sidebar-item {{ request()->routeIs('laporan.index') ? 'active' : '' }}">
                    <a href="{{ route('laporan.index') }}" class="sidebar-link">
                        <i class="fa-solid fa-envelope"></i>
                        <span class="align-middle">Laporan</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
