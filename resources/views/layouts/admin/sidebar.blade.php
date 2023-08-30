<aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
    <div class="app-brand d-flex justify-content-center demo ml-2">
        <a class="app-brand-link" href="{{ route('home') }}">
            <img class=""
                src="{{ $settings['site_main_logo'] ? asset('admin/images/setting/' . $settings['site_main_logo']) : asset('admin/images/logo.png') }}"
                alt="" height="60">
            {{-- <h3 class="text-primary">THEBOOKNEPAL</h3> --}}
        </a>
        <a class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none" href="javascript:void(0);">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1 mt-0">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.dashboard') }}">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!-- CMS -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>
        <!-- Cards -->
        <li class="menu-item {{ Request::segment(2) == 'categories' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.categories.index') }}">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Basic">Categories</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'products' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.products.index') }}">
                <i class="menu-icon tf-icons bx bx-purchase-tag-alt"></i>
                <div data-i18n="Basic">Products</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'orders' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.orders.index') }}">
                <i class="menu-icon tf-icons bx bx-cart"></i>
                <div data-i18n="Basic">Orders</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'users' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.users.index') }}">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Basic">Users</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'inquirypersons' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.inquirypersons.index') }}">
                <i class="menu-icon tf-icons bx bx-user-voice"></i>
                <div data-i18n="Basic">Inquiry Persons</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'sliders' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.sliders.index') }}">
                <i class="menu-icon tf-icons bx bx-slider"></i>
                <div data-i18n="Basic">Sliders</div>
            </a>
        </li>

        <!-- General Settings  -->
        <li class="menu-item @if (Request::segment(2) == 'pages' ||
                Request::segment(2) == 'settings' ||
                Request::segment(2) == 'payments' ||
                Request::segment(2) == 'socialmedias' ||
                Request::segment(2) == 'delivery') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="General Setting">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'pages' ? 'active' : '' }}"
                        href="{{ route('admin.pages.index') }}">
                        <div data-i18n="Accordion">Pages</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'delivery' ? 'active' : '' }}"
                        href="{{ route('admin.delivery.index') }}">
                        <div data-i18n="Accordion">Delivery Charges</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'payments' ? 'active' : '' }}"
                        href="{{ route('admin.payments.index') }}">
                        <div data-i18n="Accordion">Payment Gateways</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'socialmedias' ? 'active' : '' }}"
                        href="{{ route('admin.socialmedias.index') }}">
                        <div data-i18n="Accordion">Social Medias</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'settings' ? 'active' : '' }}"
                        href="{{ route('admin.settings.index') }}">
                        <div data-i18n="Accordion">Global Settings</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
