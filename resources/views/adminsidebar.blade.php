<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="width: min-content;">
          <div class="app-brand demo" style="height:auto; margin-bottom:1rem;">
            <a href="/" class="app-brand-link">
              <img src="{{asset('assets/images/ABVSSM_logo.jpg')}}" width="55" viewBox="0 0 25 50" />
              <span class="app-brand-text demo text-body fw-bolder">ABVSSM</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1" style="width:min-content;">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Profile</span>
            </li>
            <li class="menu-item">
              <a href="/" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Student Management" >Manage Profile</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="/" class="menu-link">
                    <div data-i18n="Enroll New Student">Update Password</div>
                  </a>
                </li>
                
              </ul>
            </li>
          <!-- Franchise Management -->
          <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Management</span>
            </li>
            <li class="menu-item" >
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Franchise Management" >Franchise Management</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('create-franchise')}}" class="menu-link">
                    <div data-i18n="Add  Franchise">Add  Franchise</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('manage-franchise')}}" class="menu-link">
                    <div data-i18n="Notifications">View Franchise </div>
                  </a>
                </li>
              </ul>
            </li>


            <!-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Student</span>
            </li> -->
            <li class="menu-item" >
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Student Management" >Student Management</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('add-new-student')}}" class="menu-link">
                    <div data-i18n="Add Student">Add Student</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('view-student')}}" class="menu-link">
                    <div data-i18n="Connections">View Student </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('view-student-enquiry-list')}}" class="menu-link">
                    <div data-i18n="Connections"> Student Enquiry List</div>
                  </a>
                </li>
              </ul>
            </li>


            <!-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Course</span>
            </li> -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Course Management" >Course Management</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('coursesList')}}" class="menu-link">
                    <div data-i18n="Notifications">View Course </div>
                  </a>
                </li>
   
              </ul>
            </li>
   <!-- Wallet -->

   <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Wallet</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Wallet" >Wallet</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a class="menu-link">
                    <div data-i18n="Add Balance" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">Add Balance</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="" class="menu-link">
                    <div data-i18n="Connections">View Transaction </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="" class="menu-link">
                    <div data-i18n="Connections">View Franchise Deposit Amount Request </div>
                  </a>
                </li>
              </ul>
            </li>
            
   
            

            
  
          </ul>
      </aside>

      

     