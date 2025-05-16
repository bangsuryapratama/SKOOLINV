<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>INVENTARIS</title>
  
</head>
<body>
  <div class="sidebar" data-background-color="light">
    
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="light-theme">
      <a href="{{ route('welcome') }}" class="text-dark navbar-brand d-flex justify-content-center align-items-center p-3">
        <img src="{{ asset('assets/images/logop.png') }}" alt="Logo" class="img-fluid mt-2" style="max-height: 55px;" />
      </a>
      <div class="nav-toggle d-flex">
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

    <!-- Sidebar Content -->
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">

          <!-- Dashboard -->
          <li class="nav-item {{ request()->routeIs('welcome') ? 'active' : '' }}">
            <a href="{{ route('welcome') }}" class="collapsed" aria-expanded="false">
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- Section -->
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section"><small>Lainnya</small></h4>
          </li>

          <!-- Menu Khusus Admin -->
          @if (Auth::check() && Auth::user()->is_admin === 1)

            <li class="nav-item {{ request()->routeIs('pengguna.*') ? 'active' : '' }}">
              <a href="{{ route('pengguna.index') }}">
                <i class="fas fa-address-card"></i>
                <p>Data Petugas</p>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('barang.*') ? 'active' : '' }}">
              <a href="{{ route('barang.index') }}">
                <i class="fas fa-dolly-flatbed"></i>
                <p>Data Barang</p>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('barangmasuk.*') ? 'active' : '' }}">
              <a href="{{ route('barangmasuk.index') }}">
                <i class="fas fa-arrow-circle-right"></i>
                <p>Data Barang Masuk</p>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('barangkeluar.*') ? 'active' : '' }}">
              <a href="{{ route('barangkeluar.index') }}">
                <i class="fas fa-arrow-circle-left"></i>
                <p>Data Barang Keluar</p>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
              <a href="{{ route('peminjaman.index') }}">
                <i class="fas fa-hand-holding"></i>
                <p>Data Peminjaman</p>
              </a>
            </li>

            <li class="nav-item {{ request()->routeIs('pengembalian.*') ? 'active' : '' }}">
              <a href="{{ route('pengembalian.index') }}">
                <i class="fas fa-clipboard-check"></i>
                <p>Data Pengembalian</p>
              </a>
            </li>

          @endif

        </ul>
      </div>
    </div>
    <!-- End Sidebar Content -->

  </div>
</body>
</html>
