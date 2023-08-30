@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $productdetail->seo_title ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $productdetail->meta_keywords ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $productdetail->meta_description ?? 'Pustakalaya' }}">
@endsection
@section('content')
    <!-- Product Display Section Starts -->
    <section class="product-display mt-24">
        <div class="container">
            <div class="bg-white p-12 rounded-4">
                <div class="row gap-12-row">
                    <div class="col-lg-4 col-sm-12 mt-32">
                        <swiper-container class="mySwiper"
                            style="--swiper-navigation-color: #fff;--swiper-pagination-color: #fff;"
                            thumbs-swiper=".mySwiper2" loop="true" space-between="10" navigation="true">
                            <swiper-slide>
                                <div class="img-portrait-02">
                                    <img class="zoom"
                                        src="{{ asset('admin/images/product/' . $productdetail->featured_image) }}"
                                        alt="{{ $productdetail->name ?? '' }}" />
                                    @if ($productdetail->discount)
                                        <div class="discount flex-start align-end">
                                            <div class="amount h6 fw-bold text-white">{{ $productdetail->discount }}%</div>
                                        </div>
                                    @endif
                                </div>
                            </swiper-slide>
                            @if ($productdetail->galleries->isNotEmpty())
                                @foreach ($productdetail->galleries as $g)
                                    <swiper-slide>
                                        <div class="img-portrait-02">
                                            <img class="zoom" src="{{ asset('admin/images/product/' . $g->image) }}"
                                                alt="gallery" />
                                        </div>
                                    </swiper-slide>
                                @endforeach
                            @endif
                        </swiper-container>

                        @if ($productdetail->galleries->isNotEmpty())
                            <swiper-container class="mySwiper2 mt-12" loop="true" space-between="10" slides-per-view="4"
                                free-mode="true" watch-slides-progress="true">
                                <swiper-slide>
                                    <div class="img-portrait">
                                        <img src="{{ asset('admin/images/product/' . $productdetail->featured_image) }}"
                                            alt="product" />
                                    </div>
                                </swiper-slide>
                                @foreach ($productdetail->galleries as $g)
                                    <swiper-slide>
                                        <div class="img-portrait">
                                            <img src="{{ asset('admin/images/product/' . $g->image) }}" alt="gallery" />
                                        </div>
                                    </swiper-slide>
                                @endforeach
                            </swiper-container>
                        @endif
                    </div>
                    <div class="col-lg-7 col-sm-12">
                        <div class="product-details px-12 px-sm-40 mt-12">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb-main flex-wrap">
                                    <li class="breadcrumb-main-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>

                                    @if ($productdetail->categories->isNotEmpty())
                                        @foreach ($productdetail->categories as $category)
                                            @if ($category->parent && $category->parent->parent && $category->parent->parent->parent)
                                                <li class="breadcrumb-main-item"><a
                                                        href="{{ route('product.category', $category->parent->parent->parent->slug) }}">{{ $category->parent->parent->parent->name ?? '' }}</a>
                                                </li>
                                            @endif

                                            @if ($category->parent && $category->parent->parent)
                                                <li class="breadcrumb-main-item"><a
                                                        href="{{ route('product.category', $category->parent->parent->slug) }}">{{ $category->parent->parent->name ?? '' }}</a>
                                                </li>
                                            @endif

                                            @if ($category->parent)
                                                <li class="breadcrumb-main-item"><a
                                                        href="{{ route('product.category', $category->parent->slug) }}">{{ $category->parent->name ?? '' }}</a>
                                                </li>
                                            @endif

                                            <li class="breadcrumb-main-item"><a
                                                    href="{{ route('product.category', $category->slug) }}">{{ $category->name ?? '' }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                    <li class="breadcrumb-main-item" aria-current="page">
                                        <a class="breadcrumb-main-link">{{ $productdetail->name }}</a>
                                    </li>
                                </ul>
                            </nav>
                            <h1 class="text-cGray600 h3 fw-medium mt-24">
                                {{ $productdetail->name ?? '' }}
                            </h1>
                            <div class="h5 fw-medium mt-8">
                                By: <span class="text-primary100">{{ $productdetail->author ?? 'N/A' }}</span>
                            </div>
                            <div class="text-primary100 h6 fw-medium mt-16">
                                Publisher : {{ $productdetail->publication ?? 'N/A' }}
                            </div>

                            <div class="p cGray500 text-justify mt-24 clamp-3">
                                {{ $productdetail->short_description ?? '' }}
                            </div>

                            <div class="price h6 text-primary100 mt-12 fw-regular">
                                Price:
                                <span class="h5">Rs. {{ number_format($productdetail->price ?? 0) }}</span>

                                @if ($productdetail->discount)
                                    <del class="text-accent">Rs. {{ number_format($productdetail->mrp ?? 0) }}</del>
                                @endif
                            </div>

                            @if ($productdetail->discount)
                                <div class="x-small fw-medium offer align-self-start mt-8">Save Upto Rs
                                    {{ number_format($productdetail->mrp - $productdetail->price) }}</div>
                            @endif

                            <div class="mt-24 quantity">
                                <div class="text-center p mb-8">
                                    Quantity:
                                </div>
                                <div class="d-flex gap-16">
                                    <input class="minus btn btn-sm btn-gray" type="button" value="-" />
                                    <input class="value text-center cartquantity" type="number" min="1"
                                        value="1" readonly />
                                    <input class="plus btn btn-sm btn-gray" type="button" value="+" />
                                </div>
                            </div>

                            <div class="d-flex gap-12 mt-md-24 mt-24 flex-wrap">
                                <a class="btn btn-primary text-white d-flex gap-8 justify-content-center flex-grow-1 flex-md-grow-0 addtocart"
                                    href="javascript:void()" product-id="{{ $productdetail->id }}" buy-now="yes"><i
                                        class="fa-sharp fa-solid fa-bag-shopping"></i>Buy
                                    Now</a>
                                <a class="btn btn-secondary text-white d-flex gap-8 justify-content-center flex-grow-1 flex-md-grow-0 addtocart"
                                    href="javascript:void()" product-id="{{ $productdetail->id }}"><i
                                        class="fa-solid fa-cart-shopping"></i>ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Display Section Ends -->

    <!-- About Product Section Starts -->
    <section class="product-about mt-24">
        <div class="container">
            <div class="bg-white p-32 rounded-4">
                <h2 class="h4 text-primary100">About the Book</h2>
                <div class="p text-cGray600 text-justify fw-medium mt-16">
                    {!! $productdetail->description ?? '' !!}
                </div>
            </div>
        </div>
    </section>
    <!-- About Product Section Ends-->

    <!-- Best Sellers Section Starts -->
    <section class="bestsellers mt-24 mt-sm-48">
        <div class="container">
            <div class="flex-center-between">
                <h2 class="h4 text-primary100">Related Products</h2>
                @if ($related_products->isNotEmpty() && $productdetail->categories->isNotEmpty())
                    <a class="btn btn-sm btn-primary"
                        href="{{ $productdetail->categories && $productdetail->categories[0] && $productdetail->categories[0]->slug ? route('product.category', $productdetail->categories[0]->slug) : route('products') }}">View
                        All</a>
                @endif
            </div>
            <div class="row mt-24 gap-12-row">
                @if ($related_products->isNotEmpty())
                    @foreach ($related_products as $seller)
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6 d-grid align-self-stretch">
                            <div class="card-product shadow-sm p-8 bg-white rounded-4">
                                <div class="position-relative h-100">
                                    <div class="d-flex flex-column h-100">
                                        <div class="img-portrait-02">
                                            <img src="{{ asset('admin/images/product/' . $seller->featured_image) }}"
                                                alt="{{ $seller->name ?? '' }}" />

                                            @if ($seller->discount)
                                                <div class="discount flex-start align-end">
                                                    <div class="amount small fw-bold text-white">
                                                        {{ $seller->discount ?? '' }}%</div>
                                                </div>
                                            @endif

                                        </div>
                                        <h4 class="p fw-bold text-primary100 clamp-2">{{ $seller->name ?? '' }}</h4>
                                        <h6 class="text-cGray600 p">
                                            Rs. {{ number_format($seller->price ?? 0) }}
                                            @if ($seller->discount)
                                                <del class="text-accent">Rs. {{ number_format($seller->mrp ?? 0) }}</del>
                                            @endif
                                        </h6>
                                        @if ($seller->discount)
                                            <div class="x-small fw-medium offer align-self-start">Save Upto Rs
                                                {{ number_format($seller->mrp - $seller->price) }}
                                            </div>
                                        @endif

                                        @if ($seller->slug)
                                            <a class="stretched-link"
                                                href="{{ route('product.show', $seller->slug) }}"></a>
                                        @endif

                                        <div class="flex-center-between mt-auto gap-4 flex-wrap bottom">
                                            <a class="flex-center btn btn-xs py-8 px-4 px-sm-8 btn-secondary text-center z-5 flex-grow-1 addtocart"
                                                href="javascript:void()" product-id="{{ $seller->id }}"
                                                buy-now="yes">
                                                Buy Now
                                            </a>

                                            <a class="btn flex-center btn-xs py-8 px-4 px-sm-8 btn-primary text-center z-5 flex-grow-1 addtocart"
                                                href="javascript:void()" product-id="{{ $seller->id }}">
                                                Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- Best Sellers Section Ends  -->
@endsection

@section('scripts')
    <script>
        $(".minus, .plus").click(function(e) {
            e.preventDefault();
            var $input = $(this).siblings(".value");
            var val = parseInt($input.val(), 10);
            $input.val(val + ($(this).hasClass("minus") ? -1 : 1));
            if ($input.val() < 1) {
                $input.val(1);
            }
        });
    </script>
@endsection
