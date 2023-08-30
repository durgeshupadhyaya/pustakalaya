@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['contact_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['contact_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['contact_seo_description'] ?? 'Pustakalaya' }}">
@endsection
@section('content')
    <section class="dashboard mt-24 mt-sm-32">
        <div class="container">
            <div class="row">
                @include('frontend.user.includes.menu')
                <div class="col-lg-10 col-sm-12">
                    <div class="shadow-2 py-12 px-24 bg-white">
                        <h2 class="h5 text-primary100 heading--underline mb-32">
                            Order Details
                        </h2>

                        <div class="flex-center-between">
                            <h6>Order #{{ $order->order_number ?? '' }}</h6>
                            <a class="btn btn-sm bg-primary100 text-white d-flex gap-4" href="{{ route('myorder') }}"><i
                                    class="fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                        @if ($orderItems->count() > 0)
                            @php
                                $total = 0;
                            @endphp
                            <table class="mt-32">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th class="p fw-bold" scope="col">Products</th>
                                        <th class="p fw-bold" scope="col">Price</th>
                                        <th class="p fw-bold" scope="col">Quantity</th>
                                        <th class="p fw-bold" scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $item)
                                        @php
                                            $subTotal = $item->product->price * $item->quantity;
                                            $total += $subTotal;
                                        @endphp
                                        <tr>
                                            <td style="width: 120px">
                                                <div class="img-portrait-02">
                                                    <img src="{{ asset('admin/images/product/' . ($item->product->featured_image ?? '')) }}"
                                                        alt="product" />
                                                </div>
                                            </td>
                                            <td>{{ $item->product->name ?? '' }}</td>
                                            <td>Rs. {{ number_format($item->price ?? 0) }}</td>

                                            <td>{{ $item->quantity ?? 0 }}</td>
                                            <td>Rs. {{ number_format($subTotal ?? 0) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="ms-auto border-top border-bottom">
                                    <tr>
                                        <td></td>
                                        @if ($order->coupon)
                                            <td>Coupon Discount
                                            <td class="text-primary">
                                                {{ $order->coupon->coupon_type == 'fixed' ? 'R.s ' : '' }}{{ $order->coupon->coupon_value ?? '' }}{{ $order->coupon->coupon_type == 'percent' ? '%' : '' }}
                                            </td>
                                        @endif
                                        <td class="fw-medium p">Subtotal</td>
                                        <td class="fw-medium p">Rs. {{ number_format($order->total_amount ?? 0) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        @endif

                        <div class="row gap-12-row mt-24">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <fieldset class="border border-2 p-24">
                                    <legend class="float-none w-auto legend-title">
                                        <h6 class="fw-bold">Billing Details</h6>
                                    </legend>

                                    <div>
                                        <div class="p">Full Name: {{ $billing->full_name ?? '' }}
                                        </div>
                                        <div class="p mt-4">
                                            Address: {{ $billing->address ?? '' }}
                                        </div>

                                        @if ($billing->city)
                                            <div class="p mt-4">
                                                City: {{ $billing->city ?? '' }}
                                            </div>
                                        @endif

                                        <div class="p mt-4">Contact: {{ $billing->phone ?? '' }}</div>

                                        <div class="p mt-4">Email: {{ $billing->email ?? '' }}</div>

                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <fieldset class="border border-2 p-24">
                                    <legend class="float-none w-auto legend-title">
                                        <h6 class="fw-bold">Payment Summary</h6>
                                    </legend>

                                    <div>
                                        <div class="flex-center-between mt-8">
                                            <h6>Cart Total:</h6>
                                            <p>Rs. {{ number_format($total ?? 0) }}</p>
                                        </div>

                                        @if ($order->coupon)
                                            <div class="flex-center-between mt-8">
                                                <h6>Coupon Discount:</h6>
                                                <p>{{ $order->coupon->coupon_type == 'fixed' ? 'R.s ' : '' }}{{ $order->coupon->coupon_value ?? '' }}{{ $order->coupon->coupon_type == 'percent' ? '%' : '' }}
                                                </p>
                                            </div>
                                        @endif

                                        <div class="flex-center-between mt-8">
                                            <h6>Delivery Cost:</h6>
                                            <p>Rs.{{ $order->delivery_charge ?? 0 }}</p>
                                        </div>

                                        <div class="flex-center-between mt-8">
                                            <h6>Total:</h6>
                                            <h6>R.s. {{ number_format($order->total_amount ?? 0, 2) }}</h6>
                                        </div>
                                        <p class="mt-8">
                                            Paid with
                                            <span class="text-accent"> {{ $order->payment_method ?: 'N/A' }}</span>
                                        </p>
                                        <p class="mt-8">Order Status: {{ $order->status ?: 'N/A' }}</p>
                                        <div class="align-center gap-8 mt-8">
                                            <p>Pay Status:</p>
                                            <div class="badge badge-primary text-white">
                                                {{ $order->transaction_status ?: 'Not Paid' }}
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
