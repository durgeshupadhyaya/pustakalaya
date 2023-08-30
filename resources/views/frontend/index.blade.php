@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['homepage_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['homepage_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['homepage_seo_description'] ?? 'Pustakalaya' }}">
@endsection
@section('content')
    <!-- Landing Banner Section Starts -->
    <section class="landing mt-12 mt-sm-16">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 d-grid align-items-stretch">
                    <div class="aside">
                        <div class="bg-primary100 py-8 px-16">
                            <a class="p fw-medium align-center gap-4 text-white" href="#">
                                <i class="fa-solid fa-list"></i>Categories
                            </a>
                        </div>
                        <div class="scroll">
                            <ul class="nav flex-column">
                                @if ($p_category->isNotEmpty())
                                    @foreach ($p_category as $category)
                                        <li class="nav-item">
                                            <a class="nav-link d-flex flex-center-between"
                                                href="{{ route('product.category', $category->slug) }}">
                                                {{ $category->name ?? '' }}
                                                @if (count($category->children))
                                                    <i class="fa-solid fa-angle-right small"></i>
                                                @endif
                                            </a>

                                            @if (count($category->children))
                                                @include('frontend.category.desktop', [
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
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <swiper-container class="mySwiper" pagination="true" pagination-dynamic-bullets="true" loop="true"
                        autoplay-delay="2000" auto-disable-on-interaction="false">
                        @if ($sliders->isNotEmpty())
                            @foreach ($sliders as $slider)
                                <swiper-slide>
                                    <div class="img-wide">
                                        <a href="{{ $slider->link ?? '' }}">
                                            <img src="{{ asset('admin/images/slider/' . $slider->image) }}"
                                                alt="{{ $slider->title ?? '' }}" />
                                        </a>
                                    </div>
                                </swiper-slide>
                            @endforeach
                        @else
                            <swiper-slide>
                                <div class="img-wide">
                                    <a href="#">
                                        <img src="https://images.pexels.com/photos/2465877/pexels-photo-2465877.jpeg?auto=compress&cs=tinysrgb&w=600"
                                            alt="" />
                                    </a>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="img-wide">
                                    <a href="#">
                                        <img src="https://images.pexels.com/photos/3704611/pexels-photo-3704611.jpeg?auto=compress&cs=tinysrgb&w=600"
                                            alt="" />
                                    </a>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="img-wide">
                                    <a href="#">
                                        <img src="https://images.pexels.com/photos/7976474/pexels-photo-7976474.jpeg?auto=compress&cs=tinysrgb&w=600"
                                            alt="" />
                                    </a>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="img-wide">
                                    <a href="#">
                                        <img src="https://images.pexels.com/photos/159866/books-book-pages-read-literature-159866.jpeg?auto=compress&cs=tinysrgb&w=600"
                                            alt="" />
                                    </a>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="img-wide">
                                    <a href="#">
                                        <img src="https://images.pexels.com/photos/904616/pexels-photo-904616.jpeg?auto=compress&cs=tinysrgb&w=600"
                                            alt="" />
                                    </a>
                                </div>
                            </swiper-slide>
                        @endif
                    </swiper-container>
                </div>
            </div>
        </div>
    </section>
    <!-- Landing Banner Section Ends -->

    <!-- Best Sellers Section Starts -->
    <section class="bestsellers mt-24 mt-sm-48">
        <div class="container">
            <div class="flex-center-between">
                <h2 class="h4 text-primary100 heading--underline">Best Sellers</h2>
                <a class="btn btn-sm btn-primary" href="{{ route('products') }}">View All</a>
            </div>
            <div class="row mt-24 gap-12-row">
                @foreach ($best_sellers as $seller)
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
                                                    {{ $seller->discount ?? '' }}%
                                                </div>
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
                                        <a class="stretched-link" href="{{ route('product.show', $seller->slug) }}"></a>
                                    @endif

                                    <div class="flex-center-between mt-auto gap-4 flex-wrap bottom">
                                        <a class="flex-center btn btn-xs py-8 px-4 px-sm-8 btn-secondary text-center z-5 flex-grow-1 addtocart"
                                            href="javascript:void()" product-id="{{ $seller->id }}" buy-now="yes">
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
            </div>
        </div>
    </section>
    <!-- Best Sellers Section Ends  -->

    <!-- New Arrivals Section Starts -->
    <section class="newarrivals mt-24 mt-sm-48">
        <div class="container">
            <div class="flex-center-between">
                <h2 class="h4 text-primary100 heading--underline">New Arrivals</h2>
                <a class="btn btn-sm btn-primary" href="{{ route('products') }}">View All</a>
            </div>
            <div class="row mt-24 gap-12-row">
                @foreach ($new_arrivals as $arrival)
                    <div class="col-lg-2 col-md-4 col-sm-6 col-6 d-grid align-self-stretch">
                        <div class="card-product shadow-sm p-8 bg-white rounded-4">
                            <div class="position-relative h-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="img-portrait-02">
                                        <img src="{{ asset('admin/images/product/' . $arrival->featured_image) }}"
                                            alt="{{ $arrival->name ?? '' }}" />

                                        @if ($arrival->discount)
                                            <div class="discount flex-start align-end">
                                                <div class="amount small fw-bold text-white">
                                                    {{ $arrival->discount ?? '' }}%
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    <h4 class="p fw-bold text-primary100 clamp-2">{{ $arrival->name ?? '' }}</h4>
                                    <h6 class="text-cGray600 p">
                                        Rs. {{ number_format($arrival->price ?? 0) }}
                                        @if ($arrival->discount)
                                            <del class="text-accent">Rs. {{ number_format($arrival->mrp ?? '') }}</del>
                                        @endif
                                    </h6>
                                    @if ($arrival->discount)
                                        <div class="x-small fw-medium offer align-self-start">Save Upto Rs
                                            {{ number_format($arrival->mrp - $arrival->price) }}
                                        </div>
                                    @endif
                                    @if ($arrival->slug)
                                        <a class="stretched-link" href="{{ route('product.show', $arrival->slug) }}"></a>
                                    @endif
                                    <div class="flex-center-between mt-auto gap-4 flex-wrap bottom">
                                        <a class="flex-center btn btn-xs py-8 px-4 px-sm-8 btn-secondary text-center z-5 flex-grow-1 addtocart"
                                            href="javascript:void()" product-id="{{ $arrival->id }}" buy-now="yes">
                                            Buy Now
                                        </a>

                                        <a class="btn flex-center btn-xs py-8 px-4 px-sm-8 btn-primary text-center z-5 flex-grow-1 addtocart"
                                            href="javascript:void()" product-id="{{ $arrival->id }}">
                                            Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- New Arrivals Section Ends -->

@endsection
