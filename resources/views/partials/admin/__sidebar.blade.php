<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/admin/dashboard" class="app-brand-link">
            <img src="{{ asset('assetsLanding/img/faviconadmin.png') }}" alt="nyn" class="app-brand-logo demo"
                width="55">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Dwikirent</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="align-middle bx bx-chevron-left bx-sm"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="py-1 menu-inner">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }} ">
            <a href="/admin/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Content</span></li>


        <li class="menu-item {{ request()->is('admin/rentals/create*') ? 'open active' : '' }}">
            <a href="/admin/rentals/create" class="menu-link">
                <i class="menu-icon tf-icons bx bx-left-arrow-alt"></i>
                <div data-i18n="Basic">Peminjaman Mobil</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/return*') ? 'open active' : '' }}">
            <a href="/admin/return" class="menu-link">
                <i class="menu-icon tf-icons bx bx-right-arrow-alt"></i>
                <div data-i18n="Basic">Pengembalian Mobil</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Master User</span></li>
        <li class="menu-item {{ request()->is('admin/user*') ? 'active' : '' }} ">
            <a href="/admin/user" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Accordion">Users</div>
            </a>
        </li>
        {{-- service --}}
        <li class="menu-item {{ request()->is('admin/cars*') ? 'open active' : '' }}">
            <a href="/admin/cars" class="menu-link">
                <i class="menu-icon tf-icons bx bx-car"></i>
                <div data-i18n="Basic">Mobil</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/rentals*') ? 'open active' : '' }}">
            <a href="/admin/rentals" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-left"></i>
                <div data-i18n="Basic">Data Peminjaman</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/returns*') ? 'open active' : '' }}">
            <a href="/admin/returns" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-right"></i>
                <div data-i18n="Basic">Data Pengembalian</div>
            </a>
        </li>
    </ul>
</aside>
