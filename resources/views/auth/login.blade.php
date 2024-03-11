
@extends("maindash")
@section("content")
<div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    
                  </span>
                  <!-- ../assets/vendor/fonts/boxicons.css -->
                  <!-- <img src="{{ asset('../images/ABVSSM_logo.jpg') }}" width="55" viewBox="0 0 25 42" /> -->
                  <img src="../assets//images/ABVSSM_logo.jpg" width="55" viewBox="0 0 25 42" />
                  <span class="app-brand-text demo text-body fw-bolder">ABVSSM</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome to ABVSSM! 👋</h4>
              <p class="mb-4">Please sign-in to your account</p>
                
                @if($errors->any())
                    <div class=" p-3 " style="background-color: #f7a29c;">
                        <ul class="list-unstyled" >
                            @foreach ($errors->all() as $error)
                            <li style="color: black;">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              <form id="formAuthentication" class="mb-3" action="{{ route('login') }}"  method="POST">
              @csrf
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              <!-- <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span>Create an account</span>
                </a>
              </p> -->
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
    @endsection  