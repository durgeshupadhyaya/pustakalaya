@extends('layouts.admin.master')
@section('title', 'Banners')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Banner "{{ $banner->position }}"</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.banners.update', $banner->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Position</label>
                        <select class="form-select" name="position" id="">
                            @foreach (App\Models\Banner::position as $key => $value)
                                <option value="{{ $key }}"
                                    {{ old('position', $banner->position) == $key ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Link</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror"
                            value="{{ old('link', $banner->link) }}" name="link" id="" placeholder="">
                        @error('link')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Status</label>
                        <select name="status" id="" class="form-select @error('status') is-invalid @enderror">
                            <option {{ $banner->status == 1 ? 'selected' : '' }} value="1">Published</option>
                            <option {{ $banner->status == 0 ? 'selected' : '' }} value="0">Draft</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="basic-default-message">Image
                            <span><b>({{ $banner->dimension ?? '-' }})</b></span></label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror image" name="image"
                            id="">
                        <img src="" height="60" alt="" class="view-image mt-2">
                        @if ($banner->image)
                            <img src="{{ asset('admin/images/banner/' . $banner->image) }}" width="100"
                                class="mt-2 old-image">
                        @endif
                        @error('image')
                            <div class="invalid-feedback" style="display: block;">
                                {{ $message }}
                            </div>
                        @enderror
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
