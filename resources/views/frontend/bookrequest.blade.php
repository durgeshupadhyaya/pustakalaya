@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['contact_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['contact_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['contact_seo_description'] ?? 'Pustakalaya' }}">
@endsection

@section('content')
    <section class="book-request">
        <div class="container">
            <div class="text-center py-12">
                <h1 class="h4 fw-bold ">BOOK REQUEST</h1>
                <p class="mt-8">You can request book to us</p>
            </div>
            @include('frontend.includes.message')
            <div class="shadow-4 px-32 py-16 rounded-4 bg-white">
                <form class="mt-8 mt-sm-12" action="{{ route('store.bookrequest') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row px-8 gap-24-row">
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-primary100 h6" for="full_name">Full Name</label>
                            <input class="form-control mt-8 @error('full_name') is-invalid @enderror" type="text"
                                name="full_name" value="{{ old('full_name') }}" placeholder="Your Full Name">
                            @error('full_name')
                                <div class="invalid-feedback" style="display: block;">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-primary100 h6" for="email">Email Address</label>
                            <input class="form-control mt-8 @error('email') is-invalid @enderror" type="email"
                                name="email" value="{{ old('email') }}" placeholder="Your Email">
                            @error('email')
                                <div class="invalid-feedback" style="display: block;">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-primary100 h6" for="phone">Phone Number</label>
                            <input class="form-control mt-8 @error('phone') is-invalid @enderror" type="text"
                                name="phone" value="{{ old('phone') }}" placeholder="Your Phone Number">
                            @error('phone')
                                <div class="invalid-feedback" style="display: block;">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold text-primary100 h6" for="message">Message</label>
                            <textarea class="form-control mt-8 @error('message') is-invalid @enderror" name="message" rows="7"
                                placeholder="[Books Name][Author][Publisher]">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback" style="display: block;">
                                    *{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold text-primary100 h6" for="image">Attached Image</label>
                            <div class="input-group mt-8 file">
                                <input class="form-control" type="file" name="attached_file">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <div class="col-md-6">
                                {!! RecaptchaV3::field('register') !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong class="">{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="flex-center mt-12">
                            <button class="btn btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
