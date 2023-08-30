@extends('layouts.admin.master')
@section('title', 'Downloads')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Downloads ({{ $downloads->total() }})</h5>
            <small class="text-muted float-end">
                <a href="{{ route('admin.downloads.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$downloads->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>File</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        @foreach ($downloads as $key => $download)
                            @php
                                $file_path = asset('admin/images/download/' . $download->file);
                                $ext = pathinfo($file_path, PATHINFO_EXTENSION);
                            @endphp
                            <tr>
                                <td><strong>{{ $key + $downloads->firstItem() }}</strong></td>
                                <td class="">
                                    <a href="{{ asset('admin/images/download/') }}/{{ $download->file ?: 'avatar.png' }}"
                                        data-fancybox="demo" class="fancybox">

                                        @if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png' || $ext == 'webp')
                                            <img src="{{ asset('admin/images/download/') }}/{{ $download->file ?: 'avatar.png' }}"
                                                alt="{{ $download->title }}" width="80px">
                                        @else
                                            <img src="{{ asset('admin/images/file.png') }}" alt="{{ $download->title }}"
                                                width="80px">
                                        @endif
                                    </a>
                                </td>
                                <td><strong>{{ $download->title ?? '' }}</strong></td>
                                <td><span
                                        class="badge {{ $download->status == 0 ? 'bg-label-danger' : 'bg-label-success' }}">{{ $download->status == 0 ? 'Draft' : 'Published' }}</span>
                                </td>
                                <td>{{ $download->order ?? '' }}</td>

                                <td>{{ $download->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.downloads.edit', $download->id) }}"
                                        style="float: left;margin-right: 5px;" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>


                                    <form class="delete-form"
                                        action="{{ route('admin.downloads.destroy', $download->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete_download mr-2"
                                            id="" title="Delete" data-type="confirm"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $downloads->links() }}
            @else
                <div class="card-body">
                    <h6>No Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $('.delete_download').click(function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });

        });
    </script>
@endsection
