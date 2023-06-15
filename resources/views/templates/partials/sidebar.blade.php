<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Dashboard
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            @if (Auth::user()->role == 'admin')
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('alluser') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Daftar User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('alltoko') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Daftar Toko</span>
                    </a>
                </li>
            @else
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{ route('main') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Inventory</li>
                <li class="nav-item">
                    <a href="{{ route('barang.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="package"></i>
                        <span class="link-title">Manajemen Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembelian.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="shopping-cart"></i>
                        <span class="link-title">Pembelian Stok</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('produksi.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="plus-square"></i>
                        <span class="link-title">Produksi Stok</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pemasok.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="truck"></i>
                        <span class="link-title">Daftar Pemasok</span>
                    </a>
                </li>
                @if (Auth::user()->role == 'user')
                    <li class="nav-item nav-category">Karyawan</li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('karyawan.index') }}" class="nav-link">
                            <i class="link-icon" data-feather="user"></i>
                            <span class="link-title">Daftar Karyawan</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#kasir" role="button" aria-expanded="false"
                            aria-controls="kasir">
                            <i class="link-icon" data-feather="shopping-cart"></i>
                            <span class="link-title">Karyawan</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="kasir">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('karyawan.data') }}" class="nav-link">Data Karyawan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('karyawan.user') }}" class="nav-link">User Karyawan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <li class="nav-item nav-category">Kasir</li>
                {{-- <li class="nav-item">
                    <a href="{{ route('kasir') }}" class="nav-link">
                        <i class="link-icon" data-feather="shop"></i>
                        <span class="link-title">Kasir</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#kasir" role="button" aria-expanded="false"
                        aria-controls="kasir">
                        <i class="link-icon" data-feather="shopping-cart"></i>
                        <span class="link-title">Penjualan</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="kasir">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('kasir') }}" class="nav-link">Kasir</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kasir.riwayat') }}" class="nav-link">Riwayat Penjualan</a>
                            </li>
                        </ul>
                    </div>
                </li>

            @endif

        </ul>
    </div>
</nav>
