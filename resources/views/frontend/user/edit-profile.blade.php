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
                            Account Details
                        </h2>
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="row gap-16-row px-8">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold" for="inputEmail4">First Name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('first_name') is-invalid @enderror"
                                        id="inputEmail4" type="text" name="first_name"
                                        value="{{ old('first_name', $user->first_name ?? '') }}" />
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold" for="inputPassword4">Last Name<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('last_name') is-invalid @enderror"
                                        id="inputPassword4" type="text" name="last_name"
                                        value="{{ old('last_name', $user->last_name ?? '') }}" />
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold" for="inputAddress">Email<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mt-8 @error('email') is-invalid @enderror" id="inputAddress"
                                        type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                                        readonly />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <h2 class="h5 text-primary100 heading--underline mb-32 mt-16">
                                Change Password
                            </h2>

                            <div class="row gap-16-row px-8">
                                <div class="col-12">
                                    <label class="form-label fw-bold" for="inputAddress">Current Password<span
                                            class="text-cGray600"> (leave blank to leave unchanged)</span></label>
                                    <input class="form-control mt-8 @error('current_password') is-invalid @enderror"
                                        id="inputAddress" type="password" name="current_password"
                                        value="{{ old('current_password') }}" />
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold" for="inputAddress">New Password<span
                                            class="text-cGray600"> (leave blank to leave unchanged)</span></label>
                                    <input class="form-control mt-8 @error('new_password') is-invalid @enderror"
                                        id="inputAddress" type="password" name="new_password"
                                        value="{{ old('new_password') }}" />
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold" for="inputAddress">Confirm New Password<span
                                            class="text-cGray600"> (leave blank to leave unchanged)</span></label>
                                    <input class="form-control mt-8 @error('new_confirm_password') is-invalid @enderror"
                                        id="inputAddress" type="password" name="new_confirm_password"
                                        value="{{ old('new_confirm_password') }}" />
                                    @error('new_confirm_password')
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
