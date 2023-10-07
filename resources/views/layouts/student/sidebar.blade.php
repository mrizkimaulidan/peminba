<div class="sidebar-menu">
  <ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ request()->routeIs('students.dashboard') ? 'active' : '' }}">
      <a href="{{ route('students.dashboard') }}" class="sidebar-link">
        <i class="bi bi-grid-fill"></i>
        <span>Beranda</span>
      </a>
    </li>

    <li class="sidebar-title">Daftar Menu</li>

    <li class="sidebar-item has-sub">
      <a href="#" class="sidebar-link">
        <i class="bi bi-stack"></i>
        <span>Peminjaman</span>
      </a>
      <ul class="submenu {{ request()->routeIs('students.borrowings*') ? 'active' : '' }}">
        <li class="submenu-item {{ request()->routeIs('students.borrowings.index') ? 'active' : '' }}">
          <a href="{{ route('students.borrowings.index') }}">Peminjaman Saya Hari Ini</a>
        </li>
        <li class="submenu-item {{ request()->routeIs('students.borrowings-history.index') ? 'active' : '' }}">
          <a href="{{ route('students.borrowings-history.index') }}">Riwayat Peminjaman</a>
        </li>
      </ul>
    </li>

    <li class="sidebar-item {{ request()->routeIs('students.profile-settings.*') ? 'active' : '' }}">
      <a href="{{ route('students.profile-settings.index') }}" class="sidebar-link">
        <i class="bi bi-person-fill-gear"></i>
        <span>Pengaturan Profil</span>
      </a>
    </li>

    <li class="sidebar-title"></li>

    <li class="sidebar-item">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="{{ route('logout') }}" class="sidebar-link" id="logout">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </form>
    </li>
  </ul>
</div>
