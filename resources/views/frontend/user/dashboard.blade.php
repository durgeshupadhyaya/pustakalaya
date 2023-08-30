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
                    <div class="tab-content shadow-2 py-12 px-24 bg-white" id="v-pills-tabContent">
                        <div class="tab-pane fade show active fw-medium h6" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <h2 class="h5 text-primary100 heading--underline mb-32">
                                Dashboard
                            </h2>
                            Hello {{ Auth::user()->first_name ?? '' }}
                            {{ Auth::user()->last_name ?? '' }} , ({{ Auth::user()->email ?? '' }}
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('userlogout-form').submit();">Log
                                out?</a> )
                            <div class="mt-8 p text-cGray600">
                                From your account dashboard you can view your recent <a
                                    href="{{ route('myorder') }}">orders,</a>
                                manage your <a href="{{ route('billing.details') }}">billing addresses,</a> and <a
                                    href="{{ route('profile.edit') }}">edit your
                                    password and
                                    account details.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
