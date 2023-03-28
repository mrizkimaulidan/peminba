<div class="sidebar-menu">
  <ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ request()->routeIs('officers.dashboard') ? 'active' : '' }}">
      <a href="{{ route('officers.dashboard') }}" class="sidebar-link">
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

    <li class="sidebar-item has-sub">
      <a href="#" class="sidebar-link">
        <i class="bi bi-stack"></i>
        <span>Peminjaman</span>
      </a>
      <ul class="submenu {{ request()->routeIs('officers.borrowings*') ? 'active' : '' }}">
        <li class="submenu-item {{ request()->routeIs('officers.borrowings.index') ? 'active' : '' }}">
          <a href="{{ route('officers.borrowings.index') }}">Peminjaman Hari Ini</a>
        </li>
        <li class="submenu-item">
          <a href="component-badge.html">Histori Peminjaman</a>
        </li>
        <li class="submenu-item {{ request()->routeIs('administrators.borrowings-report.index') ? 'active' : '' }}">
          <a href="{{ route('administrators.borrowings-report.index') }}">Laporan</a>
        </li>
      </ul>
    </li>

    <li class="sidebar-title">Manajemen Akun</li>

    <li class="sidebar-item {{ request()->routeIs('administrators.students.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.students.index') }}" class="sidebar-link">
        <i class="bi bi-people-fill"></i>
        <span>Mahasiswa</span>
      </a>
    </li>

    <li class="sidebar-item {{ request()->routeIs('administrators.profile-settings.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.profile-settings.index') }}" class="sidebar-link">
        <i class="bi bi-person-fill-gear"></i>
        <span>Pengaturan Profil</span>
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
