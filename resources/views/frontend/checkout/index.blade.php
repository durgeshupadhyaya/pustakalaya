@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['contact_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['contact_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['contact_seo_description'] ?? 'Pustakalaya' }}">
@endsection
@section('content')
    <!-- Checkout Section Starts -->
    <section class="checkout mt-24 mt-sm-32">
        <div class="container">
            <h1 class="heading--underline h4">Checkout</h1>

            <form class="" action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="row mt-12 mt-sm-32 gap-16-row">

                    <div class="col-lg-8 col-sm-12">
                        @include('frontend.includes.message')

                        <div class="billing rounded-4 p-16 px-sm-48 py-sm-32 bg-white shadow-2">
                            <h3 class="heading--underline h5">
                                Billing & Shipping Address
                            </h3>

                            <div class="row gap-16-row  mt-24 mt-sm-32 px-12">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold" for="inputEmail4">Full Name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('full_name') is-invalid @enderror"
                                        id="inputEmail4" type="text" name="full_name"
                                        value="{{ old('full_name', $billing_address->full_name ?? '') }}"
                                        placeholder="Your Name" />
                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>*{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold" for="inputPassword4">Phone<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('phone') is-invalid @enderror"
                                        id="inputPassword4" type="text" name="phone"
                                        value="{{ old('phone', $billing_address->phone ?? '') }}"
                                        placeholder="98********" />
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>*{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold" for="inputAddress">Email<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('email') is-invalid @enderror" id="inputAddress"
                                        type="email" name="email" placeholder="you@example.com"
                                        value="{{ old('email', $billing_address->email ?? '') }}" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>*{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold" for="inputAddress">Address<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('address') is-invalid @enderror"
                                        id="inputAddress" type="text" name="address" placeholder="1234 Main St"
                                        value="{{ old('address', $billing_address->address ?? '') }}" />
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>*{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold" for="inputAddress">Town / City
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('city') is-invalid @enderror" id="inputAddress"
                                        type="text" name="city"
                                        value="{{ old('city', $billing_address->city ?? '') }}" placeholder="Kathmandu" />
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>*{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        @if ($deliveryCharges->isNotEmpty())
                            <div class="rounded-4 p-16 px-sm-48 py-sm-32 bg-white mt-8">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label h6 fw-bold" for="delivery">Delivery:<span
                                                class="text-danger">*</span></label>
                                        @foreach ($deliveryCharges as $charge)
                                            <div class="form-check mt-8">
                                                <input class="form-check-input" id="flexRadioDefault1" type="radio"
                                                    name="delivery_charge" value="{{ $charge->price }}" required>
                                                <label class="form-check-label d-flex flex-center-between pt-4 h6"
                                                    for="flexRadioDefault1">
                                                    {{ $charge->title ?? '' }}
                                                    <span class="value">Rs. {{ $charge->price ?? '' }}</span>
                                                </label>
                                            </div>
                                        @endforeach

                                        @error('delivery_charge')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>*{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div id="order-view"></div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section Ends -->
@endsection

@section('scripts')
    <script>
        $(function() {
            loadOrderComponent();
        })

        function loadOrderComponent(deliveryCharge = 0) {

            $.ajax({
                url: "{{ url('/view-order/checkout') }}" + "/" + deliveryCharge,
                type: "GET",
                success: function(data) {
                    $('#order-view').html(data);
                },
                error: function(data) {
                    alert("Some Problems Occured!");
                },
            });
        }
    </script>

    <script>
        $('#applycoupon').click(function(e) {
            e.preventDefault();

            var couponFormData = new FormData($('#couponform')[0]);
            $.ajax({
                url: "{{ route('coupon') }}",
                method: 'POST',
                data: couponFormData,
                processData: false,
                cache: false,
                contentType: false,
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(data) {
                    $('#loader').hide();
                    if (data.error == true) {
                        toastr.error(data.message);
                    } else {
                        loadOrderComponent();
                        toastr.success(data.message);
                    }

                    $('#couponform')[0].reset();
                },
                error: function() {
                    $('#loader').hide();
                    alert("Some Problems Occured");
                }
            });
        })
    </script>

    <script>
        $('input[type=radio][name=delivery_charge]').change(function() {
            var deliveryCharge = this.value;
            loadOrderComponent(deliveryCharge);
        });
    </script>
@endsection
