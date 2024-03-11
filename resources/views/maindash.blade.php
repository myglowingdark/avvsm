  @extends("dashboard")

  @section("content")
  <!-- Menu -->

    <!-- aside -->
    @include("sidebar")
    <!-- / Menu -->

    <!-- Layout container -->

    <div class="layout-page">
        @include("navigation")
    
    <!-- / Navbar -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
        

            <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Content -->
            @yield("main-content")
            </div>
        </div>
    
    </div>
    
    <!-- Content wrapper -->

@endsection

