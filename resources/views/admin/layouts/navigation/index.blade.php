<ul class="menu-inner py-1">
  <li class="menu-item {{ (request()->is('admin*')) ? 'active' : '' }}">
    <a href="/admin" class="menu-link">
      <i class="menu-icon tf-icons bx bx-home-circle"></i>
      <div data-i18n="Analytics">Dashboard</div>
    </a>
  </li>
  <li class="menu-item {{ (request()->is('calculator-type*')) ? 'active' : '' }}">
    <a href="/calculator-type" class="menu-link">
      <i class="menu-icon tf-icons bx bx-calculator"></i>
      <div data-i18n="Analytics">Calculator Types</div>
    </a>
  </li>
  <li class="menu-item">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a class="menu-link" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
        <i class="bx bx-power-off me-2"></i>
        <span class="align-middle">Log Out</span>
      </a>
    </form>
  </li>
</ul>