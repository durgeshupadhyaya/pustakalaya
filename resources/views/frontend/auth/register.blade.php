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
                    <h5>REGISTER</h5>
                    <form class="mt-24" action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="row px-8">
                            <div class="col-md-6">
                                <div>
                                    <label class="form-label" for="exampleInputEmail1">FIRST NAME</label>
                                    <input
                                        class="form-control @error('first_name') is-invalid @enderror border-0 bg-cGray200 mt-8 rounded-4"
                                        id="exampleInputEmail1" type="text" name="first_name"
                                        value="{{ old('first_name') }}" aria-describedby="emailHelp" />
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">*{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label class="form-label" for="exampleInputEmail1">LAST NAME</label>
                                    <input
                                        class="form-control border-0 bg-cGray200 mt-8 rounded-4 @error('last_name') is-invalid @enderror"
                                        id="exampleInputEmail1" type="text" name="last_name"
                                        value="{{ old('last_name') }}" aria-describedby="emailHelp" />
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">*{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-24">
                            <label class="form-label" for="exampleInputEmail1">EMAIL</label>
                            <input
                                class="form-control border-0 bg-cGray200 mt-8 rounded-4 @error('email') is-invalid @enderror"
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
                                class="form-control border-0 bg-cGray200 mt-8 rounded-4 @error('password') is-invalid @enderror"
                                id="exampleInputEmail1" type="password" name="password" aria-describedby="emailHelp" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">*{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-24">
                            <label class="form-label" for="exampleInputEmail1">CONFIRM PASSWORD</label>
                            <input
                                class="form-control border-0 bg-cGray200 mt-8 rounded-4 @error('password_confirm') is-invalid @enderror"
                                id="exampleInputEmail1" type="password" name="password_confirm"
                                aria-describedby="emailHelp" />
                            @error('password_confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">*{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button class="btn text-white bg-primary100 w-100 mt-24 rounded-1">
                            Register
                        </button>
                    </form>

                    <div class="mt-24 text-center small">
                        Already have an account?
                        <a class="text-primary100" href="{{ route('login') }}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section Ends -->
@endsection
