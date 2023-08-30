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
                    <h5>Reset Password</h5>

                    @include('frontend.includes.message')
                    <div class="login-form">
                        <form action="{{ route('updateresetpassword') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label text-grey-300" for="exampleFormControlInput1">Please Enter New
                                    Password<span class="text-secondary">*</span>
                                </label>
                                <input class="form-control @error('new_password') is-invalid @enderror"
                                    id="exampleFormControlInput1" type="password" name="new_password" placeholder="">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-grey-300" for="exampleFormControlInput1">Confirm
                                    Password<span class="text-secondary">*</span>
                                </label>
                                <input class="form-control @error('new_confirm_password') is-invalid @enderror"
                                    id="exampleFormControlInput1" type="password" name="new_confirm_password"
                                    placeholder="">
                                @error('new_confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <input type="hidden" name="token" value="{{ $token }}">

                            <button class="btn btn-primary btn-sm mb-3" type="submit">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
