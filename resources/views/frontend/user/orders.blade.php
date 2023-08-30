@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['contact_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['contact_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['contact_seo_description'] ?? 'Pustakalaya' }}">
@endsection
@section('content')
    <section class="dashboard mt-24 mt-sm-32" style="min-height:30rem">
        <div class="container">
            <div class="row">
                @include('frontend.user.includes.menu')
                <div class="col-lg-10 col-sm-12">
                    <div class="shadow-2 py-12 px-24 bg-white">
                        <h2 class="h5 text-primary100 heading--underline mb-32">
                            My Orders ({{ $myorders->total() }})
                        </h2>
                        @if ($myorders->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SN</th>
                                            <th scope="col">Order Number</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">Pay Status</th>
                                            <th scope="col">Order Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($myorders as $key => $order)
                                            <tr>
                                                <th scope="row">{{ $key + $myorders->firstItem() }}</th>
                                                <td>{{ $order->order_number }}</td>
                                                <td>{{ $order->user->first_name . ' ' . $order->user->last_name ?? 'Not Registered' }}
                                                </td>
                                                <td>{{ $order->payment_method ?: 'NA' }}</td>
                                                <td>{{ $order->status ?? '' }}</td>
                                                <td>
                                                    <div class="badge badge-primary">
                                                        {{ $order->transaction_status ?: 'Not Paid' }}</div>
                                                </td>
                                                <td>{{ date('Y-m-d, h:i A', strtotime($order->created_at)) }}</td>
                                                <td>
                                                    <a class="btn bg-primary100 text-white"
                                                        href="{{ route('order.details', $order->id) }}">
                                                        <i class="fa-solid fa-eye"></i>
                                                        View</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="card-body">
                                <h6>No Data Found!</h6>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
