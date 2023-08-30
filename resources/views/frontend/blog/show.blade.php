@extends('layouts.frontend.master')

@section('seo')
    <title>{{ $blogdetails->seo_title ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $blogdetails->meta_keywords ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $blogdetails->meta_description ?? 'Pustakalaya' }}">
@endsection

@section('content')
    <section class="single mt-24 mt-sm-32">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="bg-white p-24 br-8">
                        <h1 class="h4 text-cGray700">{{ $blogdetails->title ?? '' }}</h1>
                        <div class="img-landscape rounded-4 mt-24">
                            <img src="{{ $blogdetails->image ? asset('admin/images/blog/' . $blogdetails->image) : asset('frontend/assets/images/blogs.jpeg') }}"
                                alt="{{ $blogdetails->title ?? '' }}">
                        </div>
                        <div
                            class="date d-flex gap-4 border border-2 align-items-baseline justify-content-center mt-12 p-8 rounded-5 bg-white">
                            <i class="fa-solid fa-calendar-days p"></i>
                            <h6>{{ date('d M', strtotime($blogdetails->date)) ?? '' }}</h6>
                        </div>
                        <div class="single-content p text-justify mt-16 text-cGray600">
                            {!! $blogdetails->description ?? '' !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="more position-sticky top-0">
                        <h3 class="h5 text-primary100 heading--underline mb-24">
                            More Blogs
                        </h3>

                        @if ($moreblogs->isNotEmpty())
                            @foreach ($moreblogs as $blog)
                                <div class="card-more position-relative mt-12 shadow-4 py-12 px-16 rounded-8">
                                    <div class="row">
                                        <div class="col-md-4 col-5">
                                            <div class="img-landscape position-relative rounded-4">
                                                <img src="{{ $blog->image ? asset('admin/images/blog/' . $blog->image) : asset('frontend/assets/images/blogs.jpeg') }}"
                                                    alt="{{ $blog->title ?? '' }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-7">
                                            <h6 class="p">{{ $blog->title ?? '' }}</h6>
                                            <div class="small clamp-2">
                                                {{ strlen($blog->short_description) > 55 ? substr($blog->short_description, 0, 55) . '...' : $blog->short_description }}
                                            </div>
                                        </div>
                                        <a class="stretched-link" href="{{ route('blog.show', $blog->slug) }}"></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <h3 class="mt-24 mb-24 h5 heading--underline">
                            Explore Our Categories
                        </h3>
                        @foreach ($categories as $category)
                            <div class="card-more position-relative mt-12 shadow-4 py-12 px-16 rounded-8">
                                <div class="row">
                                    <div class="col-md-4 col-5">
                                        <div class="img-landscape position-relative rounded-4">
                                            <img src="{{ $category->image ? asset('admin/images/category/' . $category->image) : asset('frontend/assets/images/blogs.webp') }}"
                                                alt="{{ $category->name ?? '' }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-7">
                                        <h6 class="p">{{ $category->name ?? '' }}</h6>
                                        <div class="small clamp-2">
                                            {{ strlen($category->short_description) > 55 ? substr($category->short_description, 0, 55) . '...' : $category->short_description }}
                                        </div>
                                    </div>
                                    <a class="stretched-link" href="{{ route('product.category', $category->slug) }}"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
