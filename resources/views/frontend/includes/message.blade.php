@if (Session::has('message'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        <p class="">{{ Session::get('message') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        <p>*{{ Session::get('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger p-2 alert-dismissible" role="alert">
        <p class="text-danger">*{{ Session::get('error') }}</p>
        <button type="button" class="btn-close p-1" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
