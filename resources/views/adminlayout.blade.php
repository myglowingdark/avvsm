@extends("admin")
@section("admincontent")
<style>
    .equal-height {
      display: flex;
    }
    .equal-height > .cardcol {
      display: flex;
      flex-direction: column;
    }
    .equal-height > .cardcol > .card {
      flex: 1;
    }
</style>
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Welcome {{ auth()->user()->username }} ! 🎉</h5>
                          <p class="mb-4">
                          Have a great Day!
                          </p>
                           
                          <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> -->
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="order-2 my-4">
                    <div class="row equal-height">
                      <div class="col-lg-3 col-md-3 col-6 mb-4 cardcol">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img
                                  src="../assets/img/icons/unicons/chart-success.png"
                                  alt="chart success"
                                  class="rounded"
                                />
                              </div>
                    
                            </div>
                            <span class="fw-semibold d-block mb-1">View Franchise</span>
                            <h3 class="card-title mb-2">{{$franchise}}</h3>
                            <a href="{{route('manage-franchise')}}" class="btn rounded-pill btn-outline-success">View</a>
                            <!-- <button type="button" class="btn rounded-pill btn-outline-success" >View</button> -->
                          </div>
                        </div>
                      </div>
                     
                      <div class="col-lg-3 col-md-3 col-6 mb-4 cardcol">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                              </div>
                              <!-- <div class="dropdown">
                                <button
                                  class="btn p-0"
                                  type="button"
                                  id="cardOpt4"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                >
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                              </div> -->
                            </div>
                            <span class="d-block mb-1">View Students</span>
                            <h3 class="card-title text-nowrap mb-2">{{$student}}</h3>
                            
                            <a href="{{route('view-student')}}" class="btn rounded-pill btn-outline-danger">View</a>
                            <!-- <button type="button" class="btn rounded-pill btn-outline-danger">View</button> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-6 mb-4 cardcol">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img
                                  src="../assets/img/icons/unicons/wallet-info.png"
                                  alt="Credit Card"
                                  class="rounded"
                                />
                              </div>
                              <!-- <div class="dropdown">
                                <button
                                  class="btn p-0"
                                  type="button"
                                  id="cardOpt6"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                >
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                              </div> -->
                            </div>
                            <span>Add Course</span>
                            <h3 class="card-title text-nowrap mb-1"></h3>
  
                            <div class="col-lg-4 col-md-6 ">
                        <!-- <small class="text-light fw-semibold">Vertically centered</small> -->
                        <div class="mt-3">
                          <!-- Button trigger modal -->
                          <button type="button" class="btn rounded-pill btn-outline-info"  data-bs-toggle="modal"
                            data-bs-target="#CourseModalCenter">Add</button>
                          <!-- <button
                            type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCenter"
                          >
                            Deposit Amount
                          </button> -->
  
                          <!-- Modal -->
                          <div class="modal fade" id="CourseModalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Add Courses</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="{{route('courses.create')}}">
                                     @csrf           
                                     <div class="modal-body">
                                      <div class="row g-2">
                                          <div class="col mb-3">
                                              <label for="courseName" class="form-label">Course Name<span class="text-danger">*</span></label>
                                              <input type="text" id="course_name" class="form-control" name="course_name" placeholder="Enter Course Name">
                                          </div>
                                          <div class="col mb-3">
                                            <label for="duration" class="form-label">Course Duration<span class="text-danger">*</span></label>
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <select id="duration_years" class="form-select" name="duration_years">
                                                        <option value="" selected disabled>Select Years</option>
                                                        <option value="1">1 year</option>
                                                        <option value="2">2 years</option>
                                                        <option value="3">3 years</option>
                                                        <option value="4">4 years</option>

                                                        <!-- Add more options as needed -->
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <select id="duration_months" class="form-select" name="duration_months">
                                                        <option value="" selected disabled>Select Months</option>
                                                        <option value="0">0 month</option>
                              
                                                        <option value="1">1 month</option>
                                                        <option value="2">2 months</option>
                                                        <option value="3">3 months</option>
                                                        <option value="4">4 months</option>
                                                        <option value="5">5 months</option>
                                                        <option value="6">6 months</option>
                                                        <option value="7">7 months</option>
                                                        <option value="8">8 months</option>
                                                        <option value="9">9 months</option>
                                                        <option value="10">10 months</option>
                                                        <option value="11">11months</option>

                                                        <!-- Add more options as needed -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                      </div>
                                      <div class="row g-2">
                                          <div class="col mb-0">
                                              <label for="fees" class="form-label">Course Fees<span class="text-danger">*</span></label>
                                              <input type="text" id="fees" class="form-control" name="fees" placeholder="Enter Course Fees">
                                          </div>
                                          <div class="col mb-0">
                                              <label for="noOfSemester" class="form-label">Number of Semesters<span class="text-danger">*</span></label>
                                              <input type="text" id="noOfSemester" class="form-control" placeholder="Enter Number of Semesters">
                                          </div>
                                      </div>
                                  </div>
                              
                                  
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                      </div>
                            <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-6 mb-4 cardcol">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                              </div>
                              <!-- <div class="dropdown">
                                <button
                                  class="btn p-0"
                                  type="button"
                                  id="cardOpt1"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                >
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                              </div> -->
                            </div>
                            <span class="fw-semibold d-block mb-1">Amount Requests</span>
                            <h3 class="card-title mb-2"></h3>
                            <a href="" class="btn rounded-pill btn-outline-primary">View</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                  </div>
                  
                </div>
               
                <div class="col-lg-4 col-md-12 order-1">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Transactions</h5>
                      <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                          <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded">
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Paypal</small>
                              <h6 class="mb-0">Send money</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">+82.6</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div> -->
                  </div>
                </div>
                
              </div>
  
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">GlowingDark</a>
                </div>
                <!-- <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div> -->
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
@endsection