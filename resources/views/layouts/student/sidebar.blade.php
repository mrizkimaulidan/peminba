<div class="sidebar-menu">
  <ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ request()->routeIs('students.dashboard') ? 'active' : '' }}">
      <a href="{{ route('students.dashboard') }}" class="sidebar-link">
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
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
          <a href="#">Peminjaman Saya Hari Ini</a>
        </li>
        <li class="submenu-item">
          <a href="#">Histori Peminjaman</a>
        </li>
      </ul>
    </li>

    <li class="sidebar-item">
      <a href="#" class="sidebar-link">
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
