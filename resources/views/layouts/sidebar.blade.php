<div class="sidebar-menu">
  <ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ request()->routeIs('administrators.dashboard') ? 'active' : '' }}">
      <a href="{{ route('administrators.dashboard') }}" class="sidebar-link">
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="sidebar-title">Data Master</li>

    <li class="sidebar-item {{ request()->routeIs('administrators.commodities.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.commodities.index') }}" class="sidebar-link">
        <i class="bi bi-collection-fill"></i>
        <span>Komoditas</span>
      </a>
    </li>

    <li class="sidebar-item {{ request()->routeIs('administrators.program-studies.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.program-studies.index') }}" class="sidebar-link">
        <i class="bi bi-bookmarks-fill"></i>
        <span>Program Studi</span>
      </a>
    </li>

    <li class="sidebar-item {{ request()->routeIs('administrators.school-classes.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.school-classes.index') }}" class="sidebar-link">
        <i class="bi bi-building-fill"></i>
        <span>Kelas</span>
      </a>
    </li>

    <li class="sidebar-item {{ request()->routeIs('administrators.subjects.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.subjects.index') }}" class="sidebar-link">
        <i class="bi bi-book-half"></i>
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
        <i class="bi bi-people-fill"></i>
        <span>Mahasiswa</span>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="form-layout.html" class="sidebar-link">
        <i class="bi bi-person-badge-fill"></i>
        <span>Administrator</span>
      </a>
    </li>

    <li class="sidebar-title"></li>

    <li class="sidebar-item">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="{{ route('logout') }}" class="sidebar-link"
          onclick="event.preventDefault(); this.closest('form').submit();">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </form>
    </li>
  </ul>
</div>
