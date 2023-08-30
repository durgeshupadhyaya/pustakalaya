@extends('layouts.frontend.master')

@section('seo')
    <title>{{ $pagedetail->seo_title ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $pagedetail->meta_keywords ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $pagedetail->meta_description ?? 'Pustakalaya' }}">
@endsection

@section('content')
    <section class="terms mt-24 mt-sm-32" style="min-height:30rem">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="text-center">
                    <h1 class="h4 text-cGray700">{{ $pagedetail->title ?? '' }}</h1>
                </div>
                <div class="text-justify p text-cGray600 mt-12 mt-sm-24">
                    {!! $pagedetail->description ?? '' !!}
                </div>
            </div>
        </div>
    </section>
@endsection
