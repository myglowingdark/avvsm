@extends("dashboard")

@section("content")
<!-- Menu -->

  <!-- aside -->
  @include("adminsidebar")
  <!-- / Menu -->

  <!-- Layout container -->

  <div class="layout-page">
      @include("navigation")
  
   
  <!-- / Navbar -->
      <!-- Content wrapper -->
      <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
          <!-- Content -->
          @yield("admincontent")
      </div>
  
  </div>



@endsection

