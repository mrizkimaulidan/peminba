<div class="sidebar-menu">
  <ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ request()->routeIs('administrators.dashboard') ? 'active' : '' }}">
      <a href="index.html" class="sidebar-link">
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="sidebar-title">Data Master</li>

    <li class="sidebar-item {{ request()->routeIs('administrators.commodities.*') ? 'active' : '' }}">
      <a href="form-layout.html" class="sidebar-link">
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>Komoditas</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="form-layout.html" class="sidebar-link">
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>Program Studi</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="form-layout.html" class="sidebar-link">
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>Kelas</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="form-layout.html" class="sidebar-link">
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>Mata Kuliah</span>
      </a>
    </li>

    <li class="sidebar-item has-sub">
      <a href="#" class="sidebar-link">
        <i class="bi bi-stack"></i>
        <span>Peminjaman</span>
      </a>
      <ul class="submenu">
        <li class="submenu-item">
          <a href="component-alert.html">Peminjaman Hari Ini</a>
        </li>
        <li class="submenu-item">
          <a href="component-badge.html">Histori Peminjaman</a>
        </li>
        <li class="submenu-item">
          <a href="component-badge.html">Laporan</a>
        </li>
      </ul>
    </li>

    <li class="sidebar-title">Manajemen Akun</li>

    <li class="sidebar-item">
      <a href="form-layout.html" class="sidebar-link">
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>Mahasiswa</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="form-layout.html" class="sidebar-link">
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>Administrator</span>
      </a>
    </li>

    <li class="sidebar-title"></li>

    <li class="sidebar-item">
      <a href="form-layout.html" class="sidebar-link">
        <i class="bi bi-file-earmark-medical-fill"></i>
        <span>Logout</span>
      </a>
    </li>
  </ul>
</div>
