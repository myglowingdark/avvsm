@extends("admin/adminform")
@section('title', 'View Course')
@section('parent-page', 'Course Management')
@section('page', 'View Course')
@section("adminform-content")

<div class="card">
                
                <div class="row align-items-center">
        <div class="col">
            <h5 class="card-header">Courses List</h5>
        </div>
        
        <div class="col text-center">
            <!-- Search input field -->
            <div class="form-group">
                <input type="text" id="searchInput" class="form-control border border-dark shadow-none pr-5" style="width: 300px;" placeholder="Search By Course Name, Fees" aria-label="Search...">
    
            </div>
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

                        <div class="modal fade" id="CourseEditModalCenter" tabindex="-1" aria-labelledby="CourseEditModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="CourseEditModalCenterTitle">Edit Course</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form method="post" action="" id="editCourseForm">
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
                                <a class="mx-2" data-bs-toggle="modal" data-bs-target="#CourseEditModalCenter" data-course-id="{{ $course->id }}" data-course-name="{{ $course->course_name }}" data-course-duration="{{ $course->duration }}" data-course-fees="{{ $course->fees }}">
                                  <i class="bx bx-edit-alt me-1">

                                  </i></a>
                              <!-- <a class="mx-2" href="{{route('courses.edit',['id' => $course->id ])}}"><i class="bx bx-edit-alt me-1"></i></a> -->
                                <!-- <a class="mx-2" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a> -->
                                <a class="mx-2" href="{{route('courses.delete',['id' => $course->id ])}}"><i class="bx bx-trash me-1"></i></a>
                              </div> 
                               </td>
                               <td><input type="checkbox" onchange="toggleButtons()"></td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
                  </div>
                  </div>
                  </div>


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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
      $('#CourseEditModalCenter').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var courseId = button.data('course-id');
          var courseName = button.data('course-name');
          var courseDuration = button.data('course-duration');
          var courseFees = button.data('course-fees');
          var years = Math.floor(courseDuration);
            var months = (courseDuration - years) * 12;

            var modal = $(this);
            modal.find('.modal-body #duration_years').val(years);
            modal.find('.modal-body #duration_months').val(months);

          modal.find('.modal-body #course_name').val(courseName);
          // modal.find('.modal-body #duration').val(courseDuration);
          modal.find('.modal-body #fees').val(courseFees);
          // Set other fields as needed
          id=  $(this).data("course-id")
        $('#editCourseForm').attr('action', '/admin/courses/' + courseId);
      });
  });
</script>

  // for searching

  <script>
  $(document).ready(function() {
    $('#searchInput').on('keyup', function() {
      var searchText = $(this).val().toLowerCase();
      $('tbody tr').each(function() {
        var courseName = $(this).find('td:nth-child(2)').text().toLowerCase();
        var duration = $(this).find('td:nth-child(3)').text().toLowerCase();
        var fees = $(this).find('td:nth-child(4)').text().toLowerCase();

        if (courseName.indexOf(searchText) === -1 && duration.indexOf(searchText) === -1 && fees.indexOf(searchText) === -1) {
          $(this).hide();
        } else {
          $(this).show();
        }
      });
    });
  });


</script>


@endsection