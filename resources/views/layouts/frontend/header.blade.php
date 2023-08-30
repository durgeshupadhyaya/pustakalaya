<nav class="navbar navbar-expand-lg py-16 bg-white">
    <div class="container gap-lg-100 gap-16">
        <button class="btn-sm canvabtn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            type="button" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </button>

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ $settings['site_main_logo'] ? asset('admin/images/setting/' . $settings['site_main_logo']) : asset('frontend/assets/images/logo.png') }}"
                alt="logo" width="180px" height="60px" />
        </a>

        <div class="flex-center-center gap-24 order-sm-3 flex-fill flex-md-grow-0 ">
            <div class="align-center gap-12">
                <i class="fa-solid fa-phone h4 text-primary100"></i>
                <div>
                    <div class="small"> Hotline</div>
                    <a class="small fw-bold"
                        href="tel:+{{ preg_replace('/\D/', '', $settings['site_contact'] ?? '') }}">{{ $settings['site_contact'] ?? '' }}</a>
                </div>
            </div>

            @if (auth()->check() && Auth::user()->user_type == 'User')
                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle align-center gap-12 " id="navbarDropdown"
                            data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <i class="fa-solid fa-user text-primary100 h4"></i>
                            <div>
                                <div class="small">Welcome, </div>
                                <div class="small fw-bold"> {{ Auth::user()->first_name ?? '' }}</div>
                            </div>

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('mydashboard') }}">Dashboard</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('myorder') }}">Orders</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('userlogout-form').submit();">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <a class="align-center gap-12 h5" href="{{ route('login') }}">
                    <i class="fa-solid fa-user h4 text-primary100"></i>
                    <div>
                        <div class="small fw-bold">Sign Up </div>
                        {{-- <div class="small fw-bold">Register</div> --}}
                    </div>

                </a>
            @endif

            <a class="align-center gap-8 position-relative" href="{{ route('cart.index') }}">
                <div>
                    <i class="fa-solid fa-cart-shopping text-primary100 h4"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge circle-xxs bg-danger"
                        id="cart-total-items">
                        {{ Cart::getContent()->count() }}
                    </span>
                </div>
                <div class="small fw-bold">
                    Cart
                </div>
            </a>
        </div>
        <div class="align-center flex-fill">

            <form class="d-flex flex-grow-1" action="{{ route('products') }}" method="GET">
                <select class="form-select navbar-nav px-12 pt-8" name="categories" aria-label="size 5 select example">
                    <option value="" selected>All</option>
                    @foreach (getCategory() as $item)
                        <option {{ $item->slug == request('categories') ? 'selected' : '' }}
                            value="{{ $item->slug ?? '' }}">{{ $item->name ?? '' }}</option>
                    @endforeach
                </select>
                <input class="form-control border-end-0 rounded-0 search-input" name="search" type="text"
                    placeholder="Search" aria-label="Search" autocomplete="off">
                <button class="btn-sm btn-primary btn-outline-success rounded-0" type="submit">
                    Search
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start" id="offcanvasExample" tabindex="-1" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header bg-primary">
        <a class="offcanvas-title h5 text-white" id="offcanvasExampleLabel" href="#">Categories</a>
        <button class="btn-close text-primary" data-bs-dismiss="offcanvas" type="button" aria-label="Close">
            <i class="fa-solid fa-xmark text-white"></i>
        </button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="aside">
            <ul class="nav flex-column">
                @if (getParentCategories()->isNotEmpty())
                    @foreach (getParentCategories() as $category)
                        <li class="nav-item">
                            <a class="nav-link d-flex flex-center-between"
                                href="{{ route('product.category', $category->slug) }}">
                                {{ $category->name ?? '' }}
                                @if (count($category->children))
                                    <i class="fa-solid fa-plus"></i>
                                @endif
                            </a>
                            @if (count($category->children))
                                @include('frontend.category.mobile', [
                                    'subCategories' => $category->children,
                                ])
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="top-menu-bar bg-primary100">
    <div class="container">
        <ul class="text-cGray100 gap-8 gap-xs-24 gap-md-32 gap-xxl-48 py-8">
            <li>
                <a class="small fw-medium gap-8 flex-center-center" href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <li>
                <a class="small fw-medium gap-8 flex-center-center" href="{{ route('page.show', 'about') }}">
                    About Us
                </a>
            </li>

            <li>
                <a class="small fw-medium gap-8 flex-center-center" href="{{ route('contact') }}">
                    Contact
                </a>
            </li>
            <form class="d-none" id="userlogout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </ul>
    </div>
</div>
