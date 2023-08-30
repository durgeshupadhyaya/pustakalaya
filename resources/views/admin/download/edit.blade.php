@extends('layouts.admin.master')
@section('title', 'Downloads')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Download "{{ $download->title }}"</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('admin.downloads.index') }}" class="btn btn-primary"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.downloads.update', $download->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $download->title) }}" name="title" id=""
                                    placeholder="">
                                @error('title')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Status</label>
                                <select name="status" id=""
                                    class="form-select @error('status') is-invalid @enderror">
                                    <option {{ $download->status == 1 ? 'selected' : '' }} value="1">
                                        Published
                                    </option>
                                    <option {{ $download->status == 0 ? 'selected' : '' }} value="0">Draft
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Order</label>
                                <input type="number" name="order"
                                    class="form-control @error('order') is-invalid @enderror"
                                    value="{{ old('order', $download->order) }}">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">File</label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror image"
                                    name="file" id="">
                                <img src="" height="60" alt="" class="view-image mt-2">
                                @if ($download->file)
                                    <img src="{{ asset('admin/images/download/' . $download->file) }}" width="100"
                                        class="mt-2 old-image">

                                    <a href="{{ asset('admin/images/download/' . $download->file) }}" target="_blank">View
                                        File</a>
                                @endif
                                @error('file')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-rotate"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
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
    </script>
@endsection
