@extends('layouts.admin.master')
@section('title', 'Delivery Charges')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Delivery Charge</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('admin.delivery.index') }}"><i
                            class="fa-solid fa-arrow-left"></i> Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.delivery.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Title</label>
                        <input class="form-control @error('title') is-invalid @enderror" id="" type="text"
                            name="title" value="{{ old('title') }}" placeholder="">
                        @error('title')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Text</label>
                        <input class="form-control @error('text') is-invalid @enderror" id="" type="text"
                            name="text" value="{{ old('text') }}" placeholder="">

                        @error('text')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Price</label>
                        <input class="form-control @error('price') is-invalid @enderror" id="" type="number"
                            name="price" value="{{ old('price') }}" placeholder="" min="1">
                        @error('price')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Order</label>
                        <input class="form-control @error('order') is-invalid @enderror" id="" type="number"
                            name="order" value="{{ old('order') }}" placeholder="">
                        @error('order')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-check"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
