@extends('layouts.admin.master')
@section('title', 'Banners')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Banners ({{ $banners->total() }})</h5>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($banners->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Dimension</th>
                            <th>Status</th>
                            <th>Position</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($banners as $key => $banner)
                            <tr>
                                <td><strong>{{ $key + $banners->firstItem() }}</strong></td>
                                <td class="">
                                    <a href="{{ asset('admin/images/banner') }}/{{ $banner->image ?: 'avatar.png' }}"
                                        data-fancybox="demo" class="fancybox">
                                        <img src="{{ asset('admin/images/banner') }}/{{ $banner->image ?: 'avatar.png' }}"
                                            alt="{{ $banner->title }}" width="80px">
                                    </a>
                                </td>
                                <td>{{ $banner->dimension ?? '-' }}</td>
                                <td><span
                                        class="badge {{ $banner->status == 0 ? 'bg-label-danger' : 'bg-label-success' }}">{{ $banner->status == 0 ? 'Draft' : 'Published' }}</span>
                                </td>
                                <td>{{ $banner->position ?? '-' }}</td>

                                <td>{{ $banner->link ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admin.banners.edit', $banner->id) }}"
                                        style="float: left;margin-right: 5px;" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>


                                    {{-- <form class="delete-form" action="{{ route('admin.banners.destroy', $banner->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete_banner mr-2"
                                            id="" title="Delete" data-type="confirm"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $banners->links() }}
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
        $('.delete_banner').click(function(e) {
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
