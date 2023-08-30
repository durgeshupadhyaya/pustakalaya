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
                        @include('frontend.includes.message')
                        <h2 class="h5 text-primary100 heading--underline mb-32">
                            Billing & Shipping Address
                        </h2>

                        <form class="px-8" action="{{ route('billing.details.update') }}" method="POST">
                            @csrf
                            <div class="row gap-16-row">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold" for="inputEmail4">Full Name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('full_name') is-invalid @enderror"
                                        id="inputEmail4" type="text" name="full_name"
                                        value="{{ old('full_name', $billing_address->full_name ?? '') }}"
                                        placeholder="Your Name" />
                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold" for="inputPassword4">Phone <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('phone') is-invalid @enderror"
                                        id="inputPassword4" type="text" name="phone"
                                        value="{{ old('phone', $billing_address->phone ?? '') }}"
                                        placeholder="98********" />
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold" for="inputAddress">Email <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('email') is-invalid @enderror" id="inputAddress"
                                        type="email" name="email" placeholder="you@example.com"
                                        value="{{ old('email', $billing_address->email ?? '') }}" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold" for="inputAddress">Address <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('address') is-invalid @enderror"
                                        id="inputAddress" type="text" name="address" placeholder="1234 Main St"
                                        value="{{ old('address', $billing_address->address ?? '') }}" />
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold" for="inputAddress">Town / City
                                        <span class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('city') is-invalid @enderror" id="inputAddress"
                                        type="text" name="city" placeholder="Kathmandu"
                                        value="{{ old('city', $billing_address->city ?? '') }}" />
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <button class="btn bg-primary100 text-white d-flex gap-8 mt-12">
                                <i class="fa-solid fa-arrows-rotate"></i> Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
