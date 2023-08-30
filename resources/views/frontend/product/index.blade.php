@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['homepage_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['homepage_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['homepage_seo_description'] ?? 'Pustakalaya' }}">
@endsection
@section('content')
    <!-- Category Section Starts -->
    <div class="py-16 container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb-main">
                <li class="breadcrumb-main-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-main-item">
                    <a href="#">Categories</a>
                </li>
                <li class="breadcrumb-main-item" aria-current="page">
                    <a class="breadcrumb-main-link" href="">Product</a>
                </li>
            </ul>
        </nav>
    </div>
    <section class="category">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row gap-12-row">
                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                <div class="col-lg-2 col-md-6 col-sm-6 col-6 mb-4 d-grid align-self-stretch">
                                    <div class="card-product shadow-sm p-8 bg-white rounded-4">
                                        <div class="position-relative h-100">
                                            <div class="d-flex flex-column h-100">
                                                <div class="img-portrait-02">
                                                    <img src="{{ asset('admin/images/product/' . $product->featured_image) }}"
                                                        alt="{{ $product->name ?? '' }}" />

                                                    @if ($product->discount)
                                                        <div class="discount flex-start align-end">
                                                            <div class="amount small fw-bold text-white">
                                                                {{ $product->discount ?? '' }}%
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                                <h4 class="p fw-bold text-primary100 clamp-2">{{ $product->name ?? '' }}
                                                </h4>
                                                <h6 class="text-cGray600 p">
                                                    Rs. {{ number_format($product->price ?? 0) }}
                                                    @if ($product->discount)
                                                        <del class="text-accent">Rs.
                                                            {{ number_format($product->mrp ?? 0) }}</del>
                                                    @endif
                                                </h6>
                                                @if ($product->discount)
                                                    <div class="x-small fw-medium offer align-self-start">Save Upto Rs
                                                        {{ number_format($product->mrp - $product->price) }}
                                                    </div>
                                                @endif
                                                @if ($product->slug)
                                                    <a class="stretched-link"
                                                        href="{{ route('product.show', $product->slug) }}"></a>
                                                @endif
                                                <div class="flex-center-between mt-auto gap-4 flex-wrap bottom">
                                                    <a class="flex-center btn btn-xs py-8 px-4 px-sm-8 btn-secondary text-center z-5 flex-grow-1 addtocart"
                                                        href="javascript:void()" product-id="{{ $product->id }}"
                                                        buy-now="yes">
                                                        Buy Now
                                                    </a>

                                                    <a class="btn flex-center btn-xs py-8 px-4 px-sm-8 btn-primary text-center z-5 flex-grow-1 addtocart"
                                                        href="javascript:void()" product-id="{{ $product->id }}">
                                                        Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                {{ $products->appends($params)->links() }}
                            </div>
                        @else
                            <p class="bg-white py-3 text-center">No product found!</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section Ends -->
@endsection

@section('scripts')
    <script src="{{ asset('frontend/assets/js/filter.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/index.js') }}"></script>
@endsection
