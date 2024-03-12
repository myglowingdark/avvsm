@extends("admin/adminform")
@section('title', 'Update Password')
@section('parent-page', 'Manage Profile')
@section('page', 'Update Password')
@section("adminform-content")




<!-- <h5 class="card-header">Change Password</h5> -->
<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
        <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                  <img src="{{ asset('/mainimage/ABVSSM_logo.jpg') }}" width="55" viewBox="0 0 25 42" />

                  </span>
                  
                </a>
              </div>
              <!-- /Logo -->
              @if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- </div> -->


@endsection