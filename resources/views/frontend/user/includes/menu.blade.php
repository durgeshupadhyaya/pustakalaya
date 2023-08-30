<div class="col-lg-2 col-sm-12">
    <div class="nav flex-column nav-pills shadow-2 w-100 p-12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <h1 class="h6 text-primary100 heading--underline">
            My Account
        </h1>
        <nav class="nav flex-column">
            <li class="nav-item me-3 me-lg-0">
                <a class="px-4 py-12 p-4 mt-12 btn d-flex gap-16 text-primary100 {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('mydashboard') }}">
                    <i class="fa-solid fa-gauge-high"></i> Dashboard
                </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
                <a class="px-4 py-12 p-4 mt-12 btn d-flex gap-16 text-primary100 {{ Request::segment(2) == 'profile' ? 'active' : '' }}"
                    href="{{ route('profile.edit') }}">
                    <i class="fa-solid fa-user"></i> Profile Details
                </a>
            </li>
            <li class="nav-item me-3 me-lg-">
                <a class="px-4 py-12 p-4 mt-12 btn d-flex gap-16 text-primary100 {{ Request::segment(2) == 'orders' ? 'active' : '' }}"
                    href="{{ route('myorder') }}">
                    <i class="fa-solid fa-cart-shopping"></i> Orders History
                </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
                <a class="px-4 py-12 mt-12 btn d-flex gap-16 text-primary100 {{ Request::segment(2) == 'billing' ? 'active' : '' }}"
                    href="{{ route('billing.details') }}">
                    <i class="fa-solid fa-home"></i> Billing Address
                </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
                <a class="px-4 py-12 mt-12 btn d-flex gap-16 text-primary100" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('userlogout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </li>

        </nav>
    </div>
</div>
