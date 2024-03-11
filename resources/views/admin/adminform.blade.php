@extends("admin")
@section("admincontent")
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">@yield("parent-page") /</span> @yield("page") </h4>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <!-- <h5 class="mb-0">Basic Layout</h5> -->
                <!-- <small class="text-muted float-end">Default label</small> -->
            </div>
            <div class="card-body">
                @yield("adminform-content")
            </div>
        </div>
    </div>
</div>
@endsection