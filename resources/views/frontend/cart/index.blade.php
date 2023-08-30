@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['contact_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['contact_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['contact_seo_description'] ?? 'Pustakalaya' }}">
@endsection
@section('content')
    <section class="cart mt-24">
        <div class="container card card-body">
            <h2 class="h4 text-primary100 heading--underline">Your Cart</h2>
            <div id="cart-view"></div>
        </div>
    </section>

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
                                                    {{ $arrival->discount ?? '' }}%</div>
                                            </div>
                                        @endif

                                    </div>
                                    <h4 class="p fw-bold text-primary100 clamp-2">{{ $arrival->name ?? '' }}</h4>
                                    <h6 class="text-cGray600 p">
                                        Rs. {{ number_format($arrival->price ?? 0) }}
                                        @if ($arrival->discount)
                                            <del class="text-accent">Rs. {{ number_format($arrival->mrp ?? 0) }}</del>
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
@section('scripts')
    <script>
        $(function() {
            loadCart();
        })

        function loadCart() {
            $.ajax({
                url: "{{ route('cartItems.view') }}",
                type: "GET",
                success: function(data) {
                    $('#cart-view').html(data);
                },
                error: function(data) {
                    alert("Some Problems Occured!");
                },
            });
        }

        function loadCartTotalQuantity() {
            $.ajax({
                url: "{{ route('carttotalquantity') }}",
                type: "GET",
                success: function(data) {
                    $('#cart-total-items').html(data);
                },
                error: function(data) {
                    alert("Some Problems Occured!");
                },
            });
        }
    </script>

    <script>
        $(document).on('click', '.empty-cart', function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "you want to empty your cart?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });
        })

        $(document).on('click', '.cart-item', function(e) {
            e.preventDefault();
            var cartitemid = $(this).attr('cart-item-id');

            $.ajax({
                url: "{{ url('view-items/cart/remove') }}" + "/" + cartitemid,
                type: "GET",
                success: function(data) {
                    loadCart();
                    loadCartTotalQuantity();
                    toastr.success("Item remove from cart");
                },
                error: function(data) {
                    alert("Some Problems Occured!");
                },
            });

        });

        $(document).on('click', '.btn-increase', function(e) {

            var id = $(this).attr('itemquantity');
            $.ajax({
                url: "{{ url('view-items/cart/increase') }}" + "/" + id,
                type: "GET",
                success: function(data) {
                    loadCart();
                    loadCartTotalQuantity();
                },
                error: function(data) {
                    alert("Some Problems Occured!");
                },
            });
        })

        $(document).on('click', '.btn-decrease', function(e) {
            var id = $(this).attr('itemquantity');

            $.ajax({
                url: "{{ url('view-items/cart/decrease') }}" + "/" + id,
                type: "GET",
                success: function(data) {
                    loadCart();
                    loadCartTotalQuantity();
                },
                error: function(data) {
                    alert("Some Problems Occured!");
                },
            });
        })
    </script>
@endsection
