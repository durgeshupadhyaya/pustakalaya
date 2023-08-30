<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    @yield('seo')

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="{{ $settings['fav_icon'] ? asset('admin/images/setting/' . $settings['fav_icon']) : asset('admin/images/logo.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
        referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- toastr ends-->


    <style>
        .grecaptcha-badge {
            display: none !important;
        }

        .toast-success {
            background-color: #0165e1;
        }
    </style>

    {!! RecaptchaV3::initJs() !!}

</head>

<body>
    <header>
        @include('layouts.frontend.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('layouts.frontend.footer')
    </footer>

    <script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/index.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/zoomsl.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/typeahead.min.js') }}"></script>

    @yield('scripts')

    <script>
        $(function() {
            $(".zoom").imagezoomsl();
        })

        var route = "{{ url('autocomplete-search') }}";
        $('.search-input').typeahead({
            source: function(query, process) {
                return $.get(route, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });

        $('.addtocart').click(function(e) {
            e.preventDefault();

            var quantity = $('.cartquantity').val();
            var productid = $(this).attr('product-id');
            var buynow = $(this).attr('buy-now');

            $.ajax({
                url: "{{ route('cart.store') }}",
                type: "POST",
                data: {
                    product_id: productid,
                    buynow: buynow,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('.cartquantity').val(1);
                    if (data == 'checkout') {
                        toastr.success("Product added to your cart");
                        var url = "{{ route('checkout') }}";
                        location.href = url;
                    } else {
                        toastr.success("Product added to your cart");
                        $('#cart-total-items').html(data);
                        loadCart();
                    }
                },
                error: function(data) {
                    toastr.error("Some problem Occured");
                },
            });
        });
    </script>
</body>

</html>
