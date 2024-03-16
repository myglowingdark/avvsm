@extends("form")
@section('title', 'Un-Registered Studens')
@section('parent-page', 'Student Management')
@section('page', 'Un-Registered Students')
@section("form-content")


                <!-- /Search -->
                <!-- <h5 class="card-header" style="margin-bottom:20px;">Un-Registered Student</h5>

                <div class="card-body" style="display: flex; justify-content: flex-start; margin-bottom: 10px;">
                
  <button type="button" id="availablebalance" class="btn btn-lg btn-primary" fdprocessedid="fdyzc7" onclick="exportToExcel()" style="display: none;">Available Balance</button>
  <button type="button" id="regstudent" class="btn btn-lg btn-primary" fdprocessedid="fdyzc7" onclick="exportToExcel()" style="display: none; margin-left: 10px;">Register Selected Student</button>
</div> -->

<div class="row align-items-center">
        <div class="col">
            <h5 class="card-header">Un-Registered Student</h5>
        </div>
        <div class="col text-center">
            <!-- Search input field -->
            <div class="form-group">
                <input type="text" id="searchInput" class="form-control border border-dark shadow-none pr-5" style="width: 300px;" placeholder="Search By Registration No, Student Name, Date Of Admission" aria-label="Search...">
                <!-- Search icon -->
                <!-- <i class="bx bx-search fs-4 lh-0 position-absolute top-50 end-0 translate-middle-y me-2"></i> -->
            </div>
        </div>
        <div class="col text-right">
        <div class="d-flex justify-content-end align-items-center">
    <button type="button" id="availablebalance" class="btn btn-primary" style="margin-right: 10px;" fdprocessedid="pnohgn" onclick="exportToExcel()" style="display: none;">Available Balance</button>
    <button type="button" id="regstudent" class="btn btn-primary" onclick="exportToExcel()" style="display:none;">Register Selected Student</button>
</div>
        </div>
    </div>


<div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                        <tr>

                         <th>
                                Select All
                                <label>
                                <input type="checkbox" id="selectAllCheckbox" onchange="toggleSelectAll()">    
                                </label>
                            </th>
                        <th>Sr.No</th>
                        <th>center</th>


                        <th>Registration No</th>
                      
                        <th>DOA</th>
                        <th>Profile</th>

                        <th>Student Name</th>

                        <th>Course Name</th>



                        <!-- <th>Action</th> -->



                      </thead>

          <tbody>
          @foreach ($students as $item)
          @if (auth()->check() && auth()->user()->username == $item->center)
    <tr>
        <td><input type="checkbox" onchange="toggleButtons()"></td>
        <td>{{ $item->id }}</td>
        <td>{{ $item->center }}</td>
        <td>{{ $item->student_id }}</td>
        <td>{{ $item->date_of_admission }}</td>
        <td>
        <img src="{{asset( $item->profile_photo )}}" alt="" class="img-fluid thumbnail" width="100px" height="100px"></td>
        <td>{{ $item->student_name }}</td>

        <td>
            {{ $item->course->course_name}}
        </td>

        <!-- <td>
            <div style=""> -->
                <!-- <a class="mx-2" href="{{ route('create-student', ['parameter' => $item->id]) }}"> -->
                    <!-- <i class="bx bx-edit-alt me-1"></i>
                </a> -->
               
                <!-- <a class="mx-2"   href="{{route('delete-student',['id' => $item->id ])}}"><i class="bx bx-trash me-1"></i></a> -->
            <!-- </div>
        </td> -->
    </tr>
    @endif
@endforeach



    

          </tbody>

        </table>

      </div>

    </div>
</div>
  
 


<script>
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

    var availableBalanceButton = document.getElementById('availablebalance');
    var regStudentButton = document.getElementById('regstudent');

    if (anyChecked) {
      availableBalanceButton.style.display = 'block';
      regStudentButton.style.display = 'block';
    } else {
      availableBalanceButton.style.display = 'none';
      regStudentButton.style.display = 'none';
    }
  }

  // for searching
    document.addEventListener('DOMContentLoaded', function () {
        var searchInput = document.getElementById('searchInput');
        var rows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function () {
            var searchText = searchInput.value.trim().toLowerCase();

            rows.forEach(function (row) {
                var registrationNo = row.cells[3].textContent.trim().toLowerCase();
                var dateOfAdmission = row.cells[4].textContent.trim().toLowerCase();
                var studentName = row.cells[6].textContent.trim().toLowerCase();

                if (registrationNo.includes(searchText) ||
                    dateOfAdmission.includes(searchText) ||
                    studentName.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection