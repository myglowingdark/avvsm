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

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
            
              <a href="{{ route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-header small text-uppercase ">
              <span class="menu-header-text">Profile</span>
            </li>
            <li class="menu-item ">
              <a href="/" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Student Management" >Manage Profile</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('create-student')}}" class="menu-link">
                    <div data-i18n="Enroll New Student">Change Password</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="" class="menu-link">
                    <div data-i18n="Notifications">Update Signature</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Student</span>
            </li>
            <li class="menu-item ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Student Management" >Student Management</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('enroll-new-student')}}" class="menu-link">
                    <div data-i18n="Enroll New Student">Enroll New Student</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('registered-students')}}" class="menu-link">
                    <div data-i18n="Notifications">Registered Student List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('unregistered-students')}}" class="menu-link">
                    <div data-i18n="Connections">Un-Registered Student List</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('franchise.student-enquiry-form')}}" class="menu-link">
                    <div data-i18n="Connections">Student Enquiry Form</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('student-enquiry-list')}}" class="menu-link">
                    <div data-i18n="Connections">Student Enquiry List</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-download"></i>

                <div data-i18n="Authentications">Download</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('download-certificates') }}" class="menu-link" >
                    <div data-i18n="Basic">Download Certificate</div>
                  </a>
                </li>
              </ul>
             </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Software Links</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="https://anydesk.com/en/downloads/windows" class="menu-link">
                    <div data-i18n="Error">Any Desk</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="https://zoom.us/download" class="menu-link">
                    <div data-i18n="Under Maintenance">Zoom</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="https://api.whatsapp.com/send?phone=919717612295" class="menu-link">
                    <div data-i18n="Under Maintenance">Support Chat</div>
                  </a>
                </li>
              </ul>
            </li>
 
            <!-- Misc -->
            <li class="menu-item">
              <a
                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                target="_blank"
                class="menu-link"
              >
                <i href="https://api.whatsapp.com/send?phone=919717612295" class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
  
          </ul>
      </aside>
      <!-- <script>
document.addEventListener('DOMContentLoaded', function() {
  // Get all menu items
  var menuItems = document.querySelectorAll('.menu-item');

  // Loop through each menu item
  menuItems.forEach(function(menuItem) {
    // Add click event listener to li elements
    menuItem.addEventListener('click', function(event) {
      // Remove 'active' class from all menu items
      menuItems.forEach(function(item) {
        item.classList.remove('active');
      });
      // Add 'active' class to clicked menu item
      menuItem.classList.add('active');

      // Toggle the submenu's active class to show/hide it
      var subMenu = menuItem.querySelector('.menu-sub');
      if (subMenu) {
        subMenu.classList.toggle('active');
      }

      // Stop propagation to prevent the submenu from collapsing
      event.stopPropagation();
    });

    // Add click event listener to ul elements
    var subMenu = menuItem.querySelector('.menu-toggle');
    if (subMenu) {
      subMenu.addEventListener('click', function(event) {
        // Remove 'active' class from all ul elements
        var allSubMenus = document.querySelectorAll('.menu-toggle');
        allSubMenus.forEach(function(subMenu) {
          subMenu.classList.remove('active');
        });
        // Add 'active' class to clicked ul element
        event.currentTarget.classList.add('active');
        // Prevent default behavior to avoid page navigation
        event.preventDefault();
      });
    }

    // Prevent propagation of click events from child li elements to parent li
    var childMenuItems = menuItem.querySelectorAll('.menu-item');
    childMenuItems.forEach(function(childMenuItem) {
      childMenuItem.addEventListener('click', function(event) {
        event.stopPropagation();
      });
    });
  });
});
</script> -->


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get all menu items with a submenu
    var menuItems = document.querySelectorAll('.menu-item.menu-toggle');
  
    // Loop through each menu item
    menuItems.forEach(function(menuItem) {
      // Add click event listener to menu items with submenu
      menuItem.addEventListener('click', function(event) {
        // Toggle the 'active' class to show/hide the submenu
        menuItem.classList.toggle('active');
  
        // Stop propagation to prevent the submenu from collapsing
        event.stopPropagation();
      });
    });
  
    // Add click event listener to document to close open submenus on outside click
    document.addEventListener('click', function() {
      // Remove 'active' class from all menu items with submenu
      menuItems.forEach(function(item) {
        item.classList.remove('active');
      });
    });
  
    // Prevent propagation of click events from submenu items to document
    var submenuItems = document.querySelectorAll('.menu-sub .menu-item');
    submenuItems.forEach(function(submenuItem) {
      submenuItem.addEventListener('click', function(event) {
        event.stopPropagation();
      });
    });
  });
  </script>

<script >
  $(window).on('load', function(){
    var currentUrl = window.location.href;
      $(".menu-item").removeClass("active");
      $(".menu-link").each(function() {
          if ($(this).attr("href") === currentUrl) {
              $(this).closest(".menu-item").addClass("active").parent().parent().addClass("active open");
          }
      });
  });

    </script>
  