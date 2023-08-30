@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['contact_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['contact_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['contact_seo_description'] ?? 'Pustakalaya' }}">
@endsection
@section('content')
    <!-- Login Section Starts -->
    <section class="login">
        <div class="container">
            <div class="flex-center-center py-24 py-md-64">
                <div class="login-form bg-white shadow-sm p-24 rounded-3">
                    @include('frontend.includes.message')
                    <h5>LOGIN</h5>
                    <form class="mt-24" action="{{ route('login.check') }}" method="POST">
                        @csrf
                        <div>
                            <label class="form-label" for="exampleInputEmail1">EMAIL</label>
                            <input
                                class="form-control @error('email') is-invalid @enderror border-0 bg-cGray200 mt-8 rounded-4"
                                id="exampleInputEmail1" type="email" name="email" value="{{ old('email') }}"
                                aria-describedby="emailHelp" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">*{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-24">
                            <label class="form-label" for="exampleInputEmail1">PASSWORD</label>
                            <input
                                class="form-control @error('password') is-invalid @enderror border-0 bg-cGray200 mt-8 rounded-4"
                                id="exampleInputEmail1" type="password" name="password" aria-describedby="emailHelp" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">*{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-16 text-primary x-small">
                            <a href="{{ route('forgotpassword') }}">Forgot Password?</a>
                        </div>
                        <button class="btn text-white bg-primary100 w-100 mt-24 rounded-1">
                            Login
                        </button>
                    </form>

                    <div class="mt-24 text-center small">
                        New to Pustakalaya?
                        <a class="text-primary100" href="{{ route('register') }}">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section Ends -->
@endsection
