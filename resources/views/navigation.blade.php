<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar">
  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
        <h3 class="text-primary m-0">
          @if (auth()->check())
          {{ strtoupper(auth()->user()->username) }}
          @endif
        </h3>
        <!-- <i class="bx bx-search fs-4 lh-0"></i>
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." /> -->
      </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
      <!-- Place this tag where you want the button to render. -->

      <!-- <button type="button" class="btn rounded-pill btn-secondary">LogOut</button> -->
      <div class="avatar flex-shrink-0" style="margin:1rem;">

        <img src="{{ asset('assets/img/icons/unicons/wallet-info.png') }}" alt="Credit Card" class="rounded" data-bs-toggle="modal" data-bs-target="#modalCenter">

</div>


       

      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <img src="{{asset('assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <!-- <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <span class="fw-semibold d-block">John Doe</span>
                  <small class="text-muted">Admin</small>
                </div>
              </div>
            </a>
          </li> -->
          <!-- <li>
            <a class="dropdown-item" href="#">
              <i class="bx bx-user me-2"></i>
              <span class="align-middle">My Profile</span>
            </a>
          </li> -->
          <!-- <li>
            <a class="dropdown-item" href="#">
              <i class="bx bx-cog me-2"></i>
              <span class="align-middle">Settings</span>
            </a>
          </li> -->

          <li>
            <a class="dropdown-item"  href="{{ route('logout') }}">
              <i class="bx bx-power-off me-2 "></i>
              <span class="align-middle text-danger"  >
                 Log Out
              </span>
              
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->
    </ul>
  </div>
</nav>
  <!-- Modal -->
  <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Deposit Amount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="text-center mb-3">
                <img src="{{asset('assets/img/icons/unicons/wallet-info.png')}}" alt="Wallet Icon" style="width: 50px; height: 50px;">
                <!-- <div class="avatar flex-shrink-0" tyle="width: 50px; height: 50px;">
                  <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" >
                </div> -->
                <div class="text-success">Wallet Amount: ₹0.00</div>
            </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="franchiseId" class="form-label">Franchise ID<span class="text-danger">*</span></label>
                        <input type="text" id="franchise_id" name="franchise_id"  class=" form-control" placeholder="Enter Franchise ID" required>
        
                       
                    </div>

                    <div class="col mb-0">
                        <label for="amount" class="form-label">Amount<span class="text-danger">*</span></label>
                        <input type="text" id="amount" name="amount" class="form-control" list="franchise_list" placeholder="Enter Amount" required>

                    </div>
                </div>
                @if (auth()->check() && auth()->user()->is_admin == 0)
    <div class="row g-2 my-3">
        <div class="col">
            <label for="TransSs" class="form-label">
                <span>Upload transaction screenshot</span>
                <span class="text-danger">*</span>
            </label>
            <input class="form-control" type="file" name="transaction_ss" id="transaction_ss" accept=".pdf, .jpg, .png" required>
        </div>
        <div class="col mb-0">
            <label for="transaction_id" class="form-label">Transaction ID<span class="text-danger">*</span></label>
            <input type="text" id="transaction_id" name="transaction_id" class="form-control" placeholder="Enter Transaction Id" required>
        </div>
    </div>
    @endif
                <div class="row mt-1">
                    <div class="col mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea id="comments" name="comments" class="form-control" placeholder="Enter Comment"></textarea>
                    </div>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" disabled>Deposit Amount</button>
            </div>
        </div>
        </form>
    </div>
</div>