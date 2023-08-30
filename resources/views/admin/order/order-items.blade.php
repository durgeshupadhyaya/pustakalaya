@extends('layouts.admin.master')
@section('title', 'Orders')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Ordered Products</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('admin.orders.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="div">
                        <a class="btn btn-outline-secondary btn-sm mr-3" href="javascript:void()" onclick="printdiv()"><i
                                class="fa fa-print" aria-hidden="true"></i>
                            Print</a>
                    </div>
                    @if ($order)
                        <div id="orderdetail">
                            <div class="row" id="orderdetail">
                                <div class="col-md-6 p-3">
                                    <div class="shipping-details-container card card-body shadow-lg p-4">
                                        <fieldset class="border p-3">
                                            <legend class="float-none w-auto legend-title">
                                                <h6 class="font-weight-bold mb-0">
                                                    Order Details
                                                </h6>
                                            </legend>

                                            <div class="shipping-address-container">
                                                <p class="orderReciverName">Order Number:
                                                    <b> {{ $order->order_number ?: 'N/A' }}</b>
                                                </p>
                                                <p class="order-shipping address">Payment Method:
                                                    {{ $order->payment_method ?: 'N/A' }}</p>
                                                <p class="order-shipping-contact">
                                                    Transaction ID: {{ $order->transaction_id ?: 'N/A' }}</p>
                                                <p class="order-shipping-contact">
                                                    Transaction Status: {{ $order->transaction_status ?: 'Not Paid' }}</p>
                                                <p class="order-shipping-contact">
                                                    Registered Customer: {{ $order->user->email ?? 'Not Registered' }}</p>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="hr my-2"></div>
                                    <div class="billing-details-container card card-body shadow-lg p-4 mt-3">
                                        <fieldset class="border p-3">
                                            <legend class="float-none w-auto legend-title">
                                                <h6 class="font-weight-bold mb-0">
                                                    Billing Details
                                                </h6>
                                            </legend>

                                            <div class="shipping-address-container">
                                                <p class="orderReciverName">Full Name:
                                                    {{ $billing->full_name ?? '' }}
                                                </p>
                                                <p class="order-shipping address">Address: {{ $billing->address ?? '' }}
                                                </p>

                                                <p class="order-shipping address">City: {{ $billing->city ?? '' }}
                                                </p>

                                                <p class="order-shipping-contact">Contact:
                                                    {{ $billing->phone ?? '' }}</p>

                                                <p class="order-shipping-contact">Email:
                                                    {{ $billing->email ?? '' }}</p>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-6 p-3">
                                    <div class="shipping-details-container card card-body shadow-lg p-4">
                                        <fieldset class="border p-3">
                                            <legend class="float-none w-auto legend-title">
                                                <h6 class="font-weight-bold mb-0">
                                                    Items
                                                </h6>
                                            </legend>
                                            <div class="shipping-address-container">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Sub-Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach ($orderItems as $item)
                                                            @php
                                                                $subTotal = $item->product->price * $item->quantity;
                                                                $total += $subTotal;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $item->product->name }}</td>
                                                                <td>{{ $item->quantity }}</td>
                                                                <td>{{ number_format($item->product->price) }}</td>
                                                                <td>{{ number_format($subTotal) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <hr>
                                                <div class="row ">
                                                    <label class="col-12 d-flex justify-content-end" for=""><b>
                                                            Total:
                                                            R.s. {{ number_format($total) }}</b></label>
                                                    @if ($order->coupon)
                                                        <label class="col-12 d-flex justify-content-end" for=""><b>
                                                                Coupon Discount
                                                                {{ $order->coupon->coupon_type == 'fixed' ? 'R.s ' : '' }}{{ $order->coupon->coupon_value ?? '' }}{{ $order->coupon->coupon_type == 'percent' ? '%' : '' }}</b>
                                                        </label>
                                                    @endif
                                                    @if ($order->delivery_charge)
                                                        <label class="col-12 d-flex justify-content-end" for=""><b>
                                                                Delivery
                                                                Charge: R.s. {{ $order->delivery_charge ?? 0 }}</b></label>
                                                    @endif
                                                    <label class="col-12 d-flex justify-content-end" for=""><b>Grand
                                                            Total:
                                                            R.s. {{ number_format($order->total_amount, 2) }}</b></label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="div mt-3 card card-body shadow-lg p-4" id="noprint">
                                        <form class="" action="{{ route('admin.order.status', $order->id) }}"
                                            method="POST">
                                            @csrf
                                            <label for="">Change Order Status</label>
                                            <select class="form-select" id="" name="status">
                                                @foreach (App\Models\Order::status as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ old('status', $order->status) == $key ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>

                                            <label class="mt-3" for="">Change Payment Status</label>
                                            <select class="form-select" id="" name="transaction_status">
                                                @foreach (App\Models\Order::paystatus as $key => $value)
                                                    <option value="{{ $value }}"
                                                        {{ old('transaction_status', $order->transaction_status) == $key ? 'selected' : '' }}>
                                                        {{ $key }}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fa-solid fa-rotate"></i>
                                                Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="footer-information border-top d-none card card-body">
                                <div class="row">
                                    <div class="card-footer py-3">
                                        <p class="text-center mb-2">
                                            THANK YOU FOR YOUR BUSINESS
                                        </p>
                                        <p class="text-center d-flex align-items-center gap-3 justify-content-center mb-0">
                                            <span class=""><i class="fa fa-globe" aria-hidden="true"></i>
                                                {{ $settings['site_location_url'] ?? '' }}</span>
                                            <span class=""><i class="fa fa-phone-square" aria-hidden="true"></i>
                                                {{ $settings['site_contact'] ?? '' }}</span>
                                            <span class=""><i class="fa fa-envelope" aria-hidden="true"></i>
                                                {{ $settings['site_email'] ?? '' }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function printdiv() {
            var newstr = document.getElementById("orderdetail").innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = newstr;
            window.print();
            window.location.reload();
            return false;
        }
    </script>
@endsection
