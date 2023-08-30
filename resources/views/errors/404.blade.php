@extends('layouts.frontend.master')

@section('content')
    <section class="error-area text-center my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="error-img">
                        <div class="media-wrapper">
                            <img src="{{ asset('frontend/assets/images/404.jpg') }}" alt="404-thebooknepal">
                        </div>
                    </div><!-- end error-img-->
                    <div class="section-heading my-3">
                        <h2 class="sectitle mb-0">Ooops! This Page Does Not Exist</h2>
                        <p class="secdesc pt-3">We're sorry, but it appears the website address you entered was <br>
                            incorrect, or is temporarily unavailable.</p>
                    </div>
                    <div class="btn-box ">
                        <a href="/" class="btn btn-primary text-white"><i class="la la-reply mr-1"></i> Back to
                            Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
