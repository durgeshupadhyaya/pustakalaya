@extends('layouts.admin.master')
@section('title', 'Product Review')

@section('content')
    @include('admin.includes.message')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Review "{{ $allreview->id }}"</h5>
                <small class="text-muted float-end">
                    <a href="{{ route('admin.allreviews.index') }}" class="btn btn-primary"><i
                            class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.allreviews.update', $allreview->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Review</label>
                            <textarea name="comments" id="" cols="30" rows="10" class="form-control" readonly>{{ old('comments', $allreview->comments ?? '') }}
                            </textarea>
                        </div>
                    </div>


                    <div class="form-group mb-3 row">
                        <div class="col-md-12">
                            <label class="form-label" for="basic-default-fullname">Status</label>
                            <select name="status" id="" class="form-select @error('status') is-invalid @enderror">
                                <option {{ $allreview->status == 1 ? 'selected' : '' }} value="1">Published</option>
                                <option {{ $allreview->status == 0 ? 'selected' : '' }} value="0">Draft</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-rotate"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
