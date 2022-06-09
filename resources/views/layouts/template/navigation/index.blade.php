<ul class="menu-inner py-1">
  <li class="menu-item {{ (request()->is('dashboard*')) ? 'active' : '' }}">
    <a href="dashboard" class="menu-link">
      <i class="menu-icon tf-icons bx bx-home-circle"></i>
      <div data-i18n="Analytics">Dashboard</div>
    </a>
  </li>
  <li class="menu-item {{ (request()->is('history*')) ? 'active' : '' }}">
    <a href="history" class="menu-link">
      <i class="menu-icon tf-icons bx bx-history"></i>
      <div data-i18n="Analytics">History</div>
    </a>
  </li>
</ul>