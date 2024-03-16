
@extends("form")
@section('title', 'Registered Students')
@section('parent-page', 'Student Management')
@section('page', 'Registered Students')
@section("form-content")
<style>
    .thclass{
    font-weight:bolder; 
    font-size: 13px;
    width: max-content
    }
</style>


  <!-- <div>

                <h5 class="card-header">Registered Student</h5>

                <div>

                <button type="button" id="exportButton" class="btn btn-lg btn-primary" fdprocessedid="fdyzc7" onclick="exportToExcel()" style="display:none; margin-left:20px;">Select all Requested Form Export</button>                </div> -->


                <div class="row align-items-center">
        <div class="col">
            <h5 class="card-header">Registered Student</h5>
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
   
    <button type="button" id="exportButton" class="btn btn-primary" onclick="exportToExcel()" style="display:none;">Export Selected Data</button>
</div>
        </div>
    </div>


                <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                        <tr>
                        
                        <th class="thclass">Select All
                            <br>
                            <label>  
                        <input type="checkbox" onclick="selectAll()">

                           </label></th>

                        <th class="thclass">Sr.No</th>
                        <th class="thclass">Center</th>
                        <th class="thclass">Registration No</th>
                        <th class="thclass">Profile</th>
                        <th class="thclass">Student Name</th>
                        <th class="thclass">Email</th>
                        <th class="thclass">DOB</th>
                        <th class="thclass">Course Name</th>
                        <th class="thclass">Course Duration</th>                      
                        <th class="thclass">amount </th>
                        <th class="thclass">Date Of Admission </th>
                        <th class="thclass">State </th>
                        <th class="thclass">Certificate issue</th>
                        <th class="thclass">Print History</th>
                        <!-- <th class="thclass">Publish Unpublished online Exam Result</th> -->
                        <th class="thclass">View Details</th>
                        <th class="thclass">Action</th>



                      </thead>

                      <tbody>

                     

                      @foreach ($students as $item) 
                      @if (auth()->check() && auth()->user()->username == $item->center)
                                  <tr>

                                <td ><input type="checkbox"></td>

                                <td>{{ $item->id }}</td>

                                <td>{{ $item->center }}</td>
                                <td>{{ $item->student_id }}</td>

                                <td> <img src="{{asset( $item->profile_photo )}}" alt="" class="img-fluid thumbnail" width="100px" height="100px"></td>
                                <td>{{ $item->student_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->date_of_birth }}</td>
                                <td>{{ $item->course->course_name }}</td>
                                <td>{{ $item->course->duration}}</td>
                                <td>{{ $item->course->fees }}</td>

                                <td>{{ $item->date_of_admission }}</td>

                                <td>{{ $item->state }}</td>
                                <td>{{ $item->certificate_issue }}Completed</td>


                                <td></td>

                                <!-- <td><span class="badge bg-label-success me-1">Completed</span></td> -->
                               <td></td>
                                <td>
                                    <!-- <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">

                                <i class="bx bx-dots-vertical-rounded"></i>

                              </button> -->

                              <div style="">
                              <!-- <a class="mx-2" href="javascript:void(0);"><i class="bx bx-show me-1"></i></a> -->

                                <!-- <a class="mx-2" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a> -->
                               <!-- <a class="mx-2"   href="{{route('delete-student',['id' => $item->id ])}}"><i class="bx bx-trash me-1"></i></a> -->
                              </div>

                            <!-- </div> -->

                                </td>

                            

                            </tr>
                            @endif

                            @endforeach

                      </tbody>

                    </table>

                  </div>

                </div>

       </div>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>

<script>
function selectAll() {
    var checkbox = document.querySelector('th input[type="checkbox"]');
    var checkboxes = document.querySelectorAll('td input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = this.checked;
    }, checkbox);
    toggleExportButton(); // Call the function to toggle the display of the export button
}

function toggleExportButton() {
    var exportButton = document.getElementById('exportButton');
    var checkboxes = document.querySelectorAll('td input[type="checkbox"]');
    var checked = false;
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            checked = true;
        }
    });
    if (checked) {
        exportButton.style.display = 'block'; // Show the export button if at least one checkbox is checked
    } else {
        exportButton.style.display = 'none'; // Hide the export button if no checkbox is checked
    }
}

function exportToExcel() {
    var rows = document.querySelectorAll('.table tbody tr');
    var wb = XLSX.utils.book_new();
    wb.SheetNames.push('Selected Data');
    var ws_data = [];
    var headers = [];
    document.querySelectorAll('.table thead th').forEach(function(header) {
        var text = header.textContent.trim();
        if (text != 'Export' && text != 'Action') {
            headers.push(text);
        }
    });
    ws_data.push(headers);
    rows.forEach(function(row) {
        var checkbox = row.querySelector('input[type="checkbox"]');
        if (checkbox.checked) {
            var row_data = [];
            row.querySelectorAll('td').forEach(function(cell, index) {
                var text = cell.textContent.trim();
                if (index !== row.cells.length - 2 && index !== row.cells.length - 1) {
                    row_data.push(text);
                }
            });
            ws_data.push(row_data);
        }
    });
    var ws = XLSX.utils.aoa_to_sheet(ws_data);
    wb.Sheets['Selected Data'] = ws;
    XLSX.writeFile(wb, 'selected_data.xlsx');
}

document.addEventListener('DOMContentLoaded', function() {
    var checkboxes = document.querySelectorAll('td input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', toggleExportButton);
    });
});


// for searching

    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector(".table");
        tr = table.querySelectorAll("tbody tr");

        tr.forEach(function(row) {
            var studentId = row.cells[3].textContent.toUpperCase(); // Assuming student_id is in the 4th column
            var studentName = row.cells[5].textContent.toUpperCase(); // Assuming student_name is in the 6th column
            var dateOfAdmission = row.cells[11].textContent.toUpperCase(); // Assuming date_of_admission is in the 12th column

            if (studentId.indexOf(filter) > -1 || studentName.indexOf(filter) > -1 || dateOfAdmission.indexOf(filter) > -1) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    document.getElementById("searchInput").addEventListener("keyup", filterTable);


</script>
@endsection
 

