@extends('layouts.admin.master')
@section('title', 'Product')

@section('content')
    @include('admin.includes.message')
    <style>
        .nav-tabs .nav-link.active,
        .nav-tabs .nav-link.active:hover,
        .nav-tabs .nav-link.active:focus {
            background: #e7e7ff;
            background-color: #7174fe;
            color: white;
        }
    </style>

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Product "{{ $product->name }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('admin.products.index') }}"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" action="{{ route('admin.products.update', $product->id) }}"
                                    method="POST" enctype="multipart/form-data" novalidate="">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-fullname">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    id="" value="{{ old('name', $product->name) }}" placeholder="">
                                                @error('name')
                                                    <div class="invalid-feedback" style="display: block;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="basic-default-fullname">Status</label>
                                                    <select name="status" id="" class="form-select">
                                                        <option {{ $product->status == 1 ? 'selected' : '' }}
                                                            value="1">Published</option>
                                                        <option {{ $product->status == 0 ? 'selected' : '' }}
                                                            value="0">Draft</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="invalid-feedback" style="display: block;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="basic-default-fullname">Tag</label>
                                                    <select name="tag" id="" class="form-select">
                                                        @foreach (App\Models\Product::tags as $key => $item)
                                                            <option
                                                                {{ old('tag', $product->tag) == $key ? 'selected' : '' }}
                                                                value="{{ $key }}">{{ $item }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('tag')
                                                        <div class="invalid-feedback" style="display: block;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label" for="basic-default-fullname">Rating</label>
                                                    <input type="number" name="rating" id=""
                                                        class="form-control @error('rating') is-invalid @enderror"
                                                        max="5" min="1"
                                                        value="{{ old('rating', $product->rating) }}">
                                                    @error('rating')
                                                        <div class="invalid-feedback" style="display: block;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label" for="basic-default-fullname">Is
                                                        Popular</label>
                                                    <br>
                                                    <input class="form-check-input" type="checkbox" name="is_popular"
                                                        value="1" id="defaultCheck3"
                                                        {{ $product->is_popular == 1 ? 'checked' : '' }}>
                                                    @error('is_popular')
                                                        <div class="invalid-feedback" style="display: block;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                            </div>

                                            <fieldset class="border border-2 p-3">
                                                <div class="br-8">
                                                    <ul class="nav nav-tabs px-4" id="myTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="price-tab"
                                                                data-bs-toggle="tab" data-bs-target="#nav-price"
                                                                type="button" role="tab" aria-controls="price"
                                                                aria-selected="true">Price</button>
                                                        </li>

                                                        <li class="nav-item" role="cost">
                                                            <button class="nav-link" id="detail-tab" data-bs-toggle="tab"
                                                                data-bs-target="#nav-detail" type="button" role="tab"
                                                                aria-controls="detail" aria-selected="true">Details</button>
                                                        </li>

                                                        <li class="nav-item" role="cost">
                                                            <button class="nav-link" id="other-tab" data-bs-toggle="tab"
                                                                data-bs-target="#nav-other" type="button" role="tab"
                                                                aria-controls="other" aria-selected="true">Other</button>
                                                        </li>

                                                        <li class="nav-item" role="cost">
                                                            <button class="nav-link" id="seo-tab" data-bs-toggle="tab"
                                                                data-bs-target="#nav-seo" type="button" role="tab"
                                                                aria-controls="seo" aria-selected="true">Seo</button>
                                                        </li>

                                                    </ul>

                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-price"
                                                            role="tabpanel" aria-labelledby="nav-price-tab">
                                                            <div class="row">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">MRP
                                                                        Price</label>
                                                                    <input type="number" min="1" name="mrp"
                                                                        id=""
                                                                        class="form-control @error('mrp') is-invalid @enderror"
                                                                        value="{{ old('mrp', $product->mrp) }}">
                                                                    @error('mrp')
                                                                        <div class="invalid-feedback" style="display: block;">
                                                                            MRP Price is required
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Discount
                                                                        (%)</label>
                                                                    <input type="number" name="discount" id=""
                                                                        class="form-control @error('discount') is-invalid @enderror"
                                                                        value="{{ old('discount', $product->discount) }}"
                                                                        min="1" max="100">
                                                                    @error('discount')
                                                                        <div class="invalid-feedback" style="display: block;">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Discounted
                                                                        Price</label>
                                                                    <input type="number" name="price" id=""
                                                                        class="form-control @error('price') is-invalid @enderror"
                                                                        value="{{ old('price', $product->price) }}"
                                                                        disabled>
                                                                    @error('price')
                                                                        <div class="invalid-feedback" style="display: block;">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="nav-detail" role="tabpanel"
                                                            aria-labelledby="nav-detail-tab">
                                                            <div class="row">
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Description</label>
                                                                    <textarea name="description" id="" cols="30" rows="10"
                                                                        class="form-control @error('description') is-invalid @enderror ckeditor">{{ old('description', $product->description) }}</textarea>
                                                                    @error('description')
                                                                        <div class="invalid-feedback" style="display: block;">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-fullname">Short
                                                                        Description</label>
                                                                    <textarea name="short_description" id="" cols="" rows="4"
                                                                        class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $product->short_description) }}</textarea>
                                                                    @error('short_description')
                                                                        <div class="invalid-feedback" style="display: block;">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="nav-other" role="tabpanel"
                                                            aria-labelledby="nav-other-tab">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                            for="basic-default-fullname">Publication</label>
                                                                        <input type="text" name="publication"
                                                                            class="form-control" placeholder=""
                                                                            value="{{ old('publication', $product->publication) }}">

                                                                        @error('publication')
                                                                            <div class="invalid-feedback"
                                                                                style="display: block;">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                            for="basic-default-fullname">Author</label>
                                                                        <input type="text" name="author"
                                                                            class="form-control" placeholder=""
                                                                            value="{{ old('author', $product->author) }}">

                                                                        @error('author')
                                                                            <div class="invalid-feedback"
                                                                                style="display: block;">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                            for="basic-default-fullname">Released
                                                                            Date</label>
                                                                        <input type="text" name="released_date"
                                                                            class="form-control flatpicker" placeholder=""
                                                                            value="{{ old('released_date', $product->released_date) }}">

                                                                        @error('released_date')
                                                                            <div class="invalid-feedback"
                                                                                style="display: block;">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                            for="basic-default-fullname">Easy
                                                                            Return</label>
                                                                        <input type="text" name="easy_return"
                                                                            class="form-control" placeholder=""
                                                                            value="{{ old('easy_return', $product->easy_return) }}">

                                                                        @error('easy_return')
                                                                            <div class="invalid-feedback"
                                                                                style="display: block;">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="nav-seo" role="tabpanel"
                                                            aria-labelledby="nav-seo-tab">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basic-default-fullname">Seo
                                                                    Title</label>
                                                                <input type="text"
                                                                    class="form-control @error('seo_title') is-invalid @enderror"
                                                                    name="seo_title" id=""
                                                                    value="{{ old('seo_title', $product->seo_title) }}"
                                                                    placeholder="">
                                                                @error('seo_title')
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-default-fullname">Meta
                                                                    Description</label>
                                                                <textarea name="meta_description" id="" cols="" rows="6"
                                                                    class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $product->meta_description) }}</textarea>
                                                                @error('meta_description')
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="basic-default-fullname">Meta Keywords</label>
                                                                <input type="text"
                                                                    class="form-control @error('meta_keywords') is-invalid @enderror"
                                                                    name="meta_keywords" id=""
                                                                    value="{{ old('meta_keywords', $product->meta_keywords) }}"
                                                                    placeholder="">
                                                                @error('meta_keywords')
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button style="background-color:#2FB9EE" type="submit"
                                                    class="btn m-4 text-white">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    Submit</button>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">
                                            @include('admin.product.includes.categories')
                                        </div>
                                    </div>
                                </form>

                                <div class="col-md-12 mt-4">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="panel panel-default">
                                                <div class="panel-header">
                                                    <h4>Other Images</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div style="margin:0 auto;text-align: center;">
                                                        @foreach ($gallery as $img)
                                                            <div style="float:left;margin-top:10px;">
                                                                <a class="delete_product_image btn btn-xs btn-danger"
                                                                    imageid="{{ $img->id }}" href=""
                                                                    type="gallery">X</a>
                                                                <img src="{{ asset('admin/images/product/' . $img->image) }}"
                                                                    style="height:100px; object-fit: contain;margin:10px;display:block">
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <form id="product_images"
                                                        action="{{ route('admin.gallery', $product->id) }}"
                                                        class="dropzone" enctype="multipart-formdata"
                                                        style="min-height:300px" method="POST">
                                                        @csrf
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple />
                                                        </div>
                                                    </form>
                                                    <div class="text-center">(210 x 315 px)</div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="panel panel-default">
                                                <div class="panel-header">
                                                    <h4>Featured Image</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <form id="product_image"
                                                        action="{{ route('admin.featured.image', $product->id) }}"
                                                        class="dropzone" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @if ($product->featured_image)
                                                            <div style="text-align:center">
                                                                <a class="delete_product_image text-white btn btn-xs btn-danger"
                                                                    imageid="{{ $product->id }}" type="featured">X</a>
                                                                <br />
                                                                <img src="{{ asset('admin/images/product/' . $product->featured_image) }}"
                                                                    style="height:100px;object-fit: contain;">
                                                            </div>
                                                        @endif

                                                        <div class="fallback">
                                                            <input name="image" type="file" />
                                                        </div>
                                                    </form>
                                                    <div class="text-center">(210 x 315 px)</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .product_category {
            height: 400px;
            overflow-x: scroll;
            border: 1px #ddd solid;
            padding: 15px;
        }

        .panel-header {
            background: #efefef;
            padding: 10px;
            text-align: center;

        }

        .panel-header h4 {
            margin: 0;
        }

        ul li label {
            padding-left: 10px;
        }

        ul {
            list-style: none;
            line-height: 20px !important;
        }
    </style>
@endsection
@section('scripts')
    <script>
        $(".image").change(function() {
            input = this;
            var nthis = $(this);

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    nthis.siblings('.old-image').hide();
                    nthis.siblings('.view-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });

        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('form#product_image', {
            maxFiles: 1,
            acceptedFiles: 'image/*',
            dictInvalidFileType: 'This form only accepts images.',
            dictDefaultMessage: 'Drag or click here to upload',
            maxFilesize: 100,
            timeout: 180000000,

        });

        Dropzone.autoDiscover = false;
        var myDropzone1 = new Dropzone('form#product_images', {
            maxFiles: 10,
            // uploadMultiple: true,
            acceptedFiles: 'image/*',
            dictInvalidFileType: 'This form only accepts images.',
            dictDefaultMessage: 'Drag or click here to upload',
            maxFilesize: 100,
            timeout: 180000000,

        });

        myDropzone.on("complete", function(file) {
            location.reload();
        });
        myDropzone1.on("complete", function(file) {
            location.reload();
        });

        $('.delete_product_image').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('imageid');
            var type = $(this).attr('type');

            var url = "{{ url('/admin/product/image/delete/') }}" + "/" + id + "/" + type;

            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            type: "GET",
                            success: function(data) {
                                location.reload();
                                toastr.success("Images Deleted Successfully!", {
                                    fadeAway: 1500
                                });
                            },
                            error: function(data) {
                                alert("Some Problems Occured!");
                            },
                        });
                    }
                });
        });
    </script>
@endsection
