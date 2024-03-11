@extends("admin/adminform")
@section('title', 'View Course')
@section('parent-page', 'Course Management')
@section('page', 'View Course')
@section("adminform-content")






<div class="card">
                <!-- <h5 class="card-header">View Enquiry Students List</h5> -->
                <div class="row align-items-center">
        <div class="col">
            <h5 class="card-header">Courses List</h5>
        </div>
        <div class="col text-right">
        <div class="d-flex justify-content-end align-items-center">
        <a  type="button" id="modalCenterTitle" class="btn btn-primary" style="margin-right: 10px;color:white;"
         fdprocessedid="pnohgn" alt="Credit Card" class="rounded" data-bs-toggle="modal" data-bs-target="#CourseModalCenter">Add Course</a>
     
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
                                              <input type="text" id="course_name" class="form-control" name="course_name" placeholder="Enter Course Name" required>
                                          </div>
                                          <div class="col mb-3">
                                            <label for="duration" class="form-label">Course Duration<span class="text-danger">*</span></label>
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <select id="duration_years" class="form-select" name="duration_years" required>
                                                        <option value="" selected disabled>Select Years</option>
                                                        <option value="1">1 year</option>
                                                        <option value="2">2 years</option>
                                                        <option value="3">3 years</option>
                                                        <option value="4">4 years</option>

                                                        <!-- Add more options as needed -->
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <select id="duration_months" class="form-select" name="duration_months" required>
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
                                              <input type="text" id="fees" class="form-control" name="fees" placeholder="Enter Course Fees" required>
                                          </div>
                                          <div class="col mb-0">
                                              <label for="noOfSemester" class="form-label">Number of Semesters<span class="text-danger">*</span></label>
                                              <input type="text" id="noOfSemester" class="form-control" placeholder="Enter Number of Semesters" required>
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
    <button type="button" id="exportdata" class="btn btn-primary" onclick="exportToExcel()" style="display:none;">Export Selected Data</button>
</div>
        </div>
    </div>    
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Course Name</th>
                          
                          <th>Duration</th>
                          <th>Fees</th>
                          <th>Semesters</th>
                          <th>Action</th>
                          <th>
                                Select All
                                <label>
                                <input type="checkbox" id="selectAllCheckbox" onchange="toggleSelectAll()">    
                                </label>
                            </th>
                          
                        </tr>
                      </thead>

                      <tbody>
                    @foreach($courses as $course)
                    <tr>
                      <td> {{ $course->id }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->duration }}</td>
                        <td>{{ $course->fees }}</td>
                        <th></th>
                        <td>
                              <div style = "">
                              <a class="mx-2" href="javascript:void(0);"><i class="bx bx-show me-1"></i></a>
                              <!-- <a class="mx-2" href="{{route('courses.edit',['id' => $course->id ])}}"><i class="bx bx-edit-alt me-1"></i></a> -->
                                <!-- <a class="mx-2" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a> -->
                                <a class="mx-2" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                              </div> 
                               </td>
                               <td><input type="checkbox" onchange="toggleButtons()"></td>
                    </tr>
                    @endforeach
                  </tbody>
                  <script>
  function exportToExcel() {
    // Logic to gather selected data and export to Excel
    var selectedRows = [];
    var checkboxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');

    checkboxes.forEach(function(checkbox) {
      var rowData = [];
      var row = checkbox.closest('tr');
      row.querySelectorAll('td').forEach(function(cell) {
        rowData.push(cell.innerText);
      });
      selectedRows.push(rowData.join('\t')); // Tab-separated values for Excel
    });

    // Prepare data for download
    var data = selectedRows.join('\n'); // New line for each row
    var blob = new Blob([data], { type: 'text/plain' });
    var url = URL.createObjectURL(blob);

    // Trigger download
    var link = document.createElement('a');
    link.setAttribute('href', url);
    link.setAttribute('download', 'selected_data.xls');
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }

  function toggleSelectAll() {
    var selectAllCheckbox = document.getElementById('selectAllCheckbox');
    var checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');

    checkboxes.forEach(function(checkbox) {
      checkbox.checked = selectAllCheckbox.checked;
    });

    toggleButtons(); // Update buttons based on the state of "Select All" checkbox
  }

  function toggleButtons() {
    var checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
    var anyChecked = false;

    checkboxes.forEach(function(checkbox) {
      if (checkbox.checked) {
        anyChecked = true;
      }
    });

    var exportButton = document.getElementById('exportdata');

    if (anyChecked) {
      exportButton.style.display = 'block';
    } else {
      exportButton.style.display = 'none';
    }
  }
</script>
@endsection