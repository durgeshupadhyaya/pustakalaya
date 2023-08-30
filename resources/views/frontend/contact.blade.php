@extends('layouts.frontend.master')
@section('seo')
    <title>{{ $settings['contact_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['contact_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['contact_seo_description'] ?? 'Pustakalaya' }}">
@endsection

@section('content')
    <section class="contact-info">
        <div class="container">
            <div class="text-center mt-12 mt-sm-16">
                <h1 class="text-primary100 h3">Contact Us</h1>
                <p class="text-cGray600 h6">We love to hear from you</p>
            </div>
            <div class="tab px-24 py-16 align-center mt-12 mt-sm-16 bg-white shadow-3">
                <div class="tab-content align-center flex-fill gap-24 flex-center">
                    <i class="fa-solid fa-location-dot h4 text-primary100"></i>
                    <div class="flex-column">
                        <h6 class="text-primary">Address</h6>
                        <p class="text-cGray700">{{ $settings['site_location'] ?? '' }}</p>
                    </div>
                </div>
                <div class="tab-content align-center flex-fill gap-12 flex-center">
                    <i class="fa-solid fa-phone h4 text-primary100"></i>
                    <div class="flex-column">
                        <h6 class="text-primary">Phone</h6>
                        <p class="text-cGray700">
                            <a
                                href="tel:+{{ preg_replace('/\D/', '', $settings['site_contact'] ?? '') }}">{{ $settings['site_contact'] ?? '' }}</a>
                        </p>
                    </div>
                </div>
                <div class="tab-content align-center flex-fill gap-12 flex-center">
                    <i class="fa-solid fa-envelope h4 text-primary100"></i>
                    <div class="flex-column">
                        <h6 class="text-primary">Email</h6>
                        <p class="text-cGray700"><a
                                href="mailto:{{ $settings['site_email'] ?? '' }}">{{ $settings['site_email'] ?? '' }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form mt-24 mt-sm-56">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form px-16 px-md-64 py-16 py-md-32 bg-primary100">
                        <h2 class="h4 text-white">DROP YOUR MESSAGE</h2>
                        <div class="p text-white fw-medium mt-8 mt-sm-12">
                            We’d Love to hear from you !
                        </div>
                        @include('frontend.includes.message')
                        <form class="mt-8 mt-sm-16" action="{{ route('inquiry') }}" method="POST">
                            @csrf
                            <div class="mt-8 mt-sm-16">
                                <div class="row px-8">
                                    <div class="col-md-6">
                                        <label class="form-label text-white fw-bold" for="exampleInputPassword1">First
                                            Name</label>
                                        <input class="form-control @error('first_name') is-invalid @enderror mt-8"
                                            id="exampleInputPassword1" type="text" name="first_name"
                                            placeholder="First Name" />
                                        @error('first_name')
                                            <div class="invalid-feedback text-white" style="display: block">
                                                *{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-white fw-bold" for="exampleInputPassword1">Last
                                            Name</label>
                                        <input class="form-control @error('last_name') is-invalid @enderror mt-8"
                                            id="exampleInputPassword1" type="text" name="last_name"
                                            placeholder="Last Name" />
                                        @error('last_name')
                                            <div class="invalid-feedback text-white" style="display: block;">
                                                *{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 mt-sm-16">
                                <label class="form-label text-white fw-bold" for="exampleInputEmail1">Email address</label>
                                <input class="form-control mt-8 @error('email') is-invalid @enderror"
                                    id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp"
                                    placeholder="example@example.com" />
                                @error('email')
                                    <div class="invalid-feedback text-white" style="display: block;">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-8 mt-sm-16">
                                <label class="form-label text-white fw-bold" for="exampleInputPassword1">Phone
                                    Number</label>
                                <input class="form-control mt-8 @error('phone') is-invalid @enderror"
                                    id="exampleInputPassword1" type="text" name="phone" placeholder="98XXXXXXXX" />
                                @error('phone')
                                    <div class="invalid-feedback text-white" style="display: block;">
                                        *{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-8 mt-sm-16">
                                <label class="form-label text-white fw-bold"
                                    for="exampleFormControlTextarea1">Message</label>
                                <textarea class="form-control mt-8 @error('message') is-invalid @enderror" id="exampleFormControlTextarea1"
                                    name="message" rows="6" placeholder="Your Message"></textarea>
                                @error('message')
                                    <div class="invalid-feedback text-white" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    {!! RecaptchaV3::field('register') !!}
                                </div>
                            </div>

                            <button class="btn btn-primary mt-8 mt-sm-16" type="submit">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="map h-100">
                        <!-- <iframe src="{{ $settings['site_map'] ?? '' }}" width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                        <img src="{{ $settings['contact_image'] ? asset('admin/images/setting/' . $settings['contact_image']) : asset('frontend/assets/images/contact.jpg') }}"
                            width="100%" height="717px" alt="contact">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
