@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['contact_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['contact_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['contact_seo_description'] ?? 'Pustakalaya' }}">
@endsection
@section('content')
    <section class="login px-md-0 px-3 flex-center-center" style="min-height:30rem">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="login-form bg-white shadow-sm p-24 rounded-3 col-md-5">
                    <h5>Forgot Password</h5>

                    @include('frontend.includes.message')
                    <div class="login-form">
                        <form action="{{ route('resetlink') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label text-grey-300" for="exampleFormControlInput1">Please enter your
                                    Email so we
                                    can send you an email to reset your password. <span class="text-secondary">*</span>
                                </label>
                                <input class="form-control @error('email') is-invalid @enderror"
                                    id="exampleFormControlInput1" type="email" name="email" placeholder="">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button class="btn btn-sm text-white bg-primary100  mt-24 rounded-1">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
