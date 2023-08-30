@extends('layouts.frontend.master')

@section('seo')
    <title>{{ $settings['blogs_seo_title'] ?? 'Pustakalaya' }}</title>
    <meta name="keywords" content="{{ $settings['blogs_seo_keywords'] ?? 'Pustakalaya' }}">
    <meta name="description" content="{{ $settings['blogs_seo_description'] ?? 'Pustakalaya' }}">
@endsection

@section('content')
    <!-- Blogs Section Starts  -->
    <section class="blog mt-24 mt-sm-48">
        <div class="container">
            <div class="flex-center-between">
                <h2 class="h4 text-primary100 heading--underline">OUR BLOGS</h2>
            </div>
            <div class="row mt-24 gap-16-row">
                @if ($blogs->isNotEmpty())
                    @foreach ($blogs as $blog)
                        <div class="col-lg-3 col-sm-12 d-grid align-self-stretch mb-3">
                            <div class="card-blog p-12 shadow-sm bg-white rounded-8">
                                <div class="position-relative">
                                    <div class="img-landscape-02 z-1">
                                        <img src="{{ $blog->image ? asset('admin/images/blog/' . $blog->image) : asset('frontend/assets/images/blogs.jpeg') }}"
                                            alt="{{ $blog->title ?? '' }}">
                                    </div>
                                    <div class="content px-8 z-4 position-relative mt-n24">
                                        <div
                                            class="date border-white bg-accent text-white btn rounded-16 btn-outline-white px-12">
                                            {{ date('d F', strtotime($blog->date)) }}
                                        </div>
                                        <h6 class="mt-8 p">
                                            {{ $blog->title ?? '' }}
                                        </h6>
                                        <div class="mt-8 small text-cGray700 clamp-4">
                                            {{ strlen($blog->short_description) > 155 ? substr($blog->short_description, 0, 155) . '...' : $blog->short_description }}
                                        </div>

                                        <a class="stretched-link fw-medium btn btn-xs btn-primary mt-12"
                                            href="{{ route('blog.show', $blog->slug) }}">READ
                                            MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {{ $blogs->links() }}
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Blogs Section Ends  -->
@endsection
