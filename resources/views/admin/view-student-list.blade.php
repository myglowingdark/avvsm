@extends("admin/adminform")
@section('title', 'View Student')
@section('parent-page', 'Student Management')
@section('page', 'View Student')
@section("adminform-content")


<div class="card">
<div class="row align-items-center">
        <div class="col">
            <h5 class="card-header">Student List</h5>
        </div>
        <div class="col text-right">
        <div class="d-flex justify-content-end align-items-center">
    <a href="{{ route('add-new-student')}}" class="btn btn-primary" style="margin-right: 10px;" fdprocessedid="pnohgn">Add Student</a>
    <button type="button" id="exportdata" class="btn btn-primary" onclick="exportToExcel()" style="display:none;">Export Selected Data</button>
</div>
        </div>
    </div>    
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          
                        <th>Profile Photo</th>
                          <th>Student id</th>
                          
                          <th>Center</th>
                          <th>Year</th>
                          
                          <th>Student Name</th>
                          <th>Father Name</th>
                          <th>Contact No</th>
                          <th>Gender</th>
                          <th>Email</th>
                          <th>marital status</th>
                          <th>Course Name</th>
                          <th>Course Duration</th>
                          <th>Date Of Birth</th>
                          <th>State</th>
                          <th>District</th>
                          <th>Date of Admission</th>
                          <!-- <th>Action</th> -->
                          <th>
                                Select All
                                <label>
                                <input type="checkbox" id="selectAllCheckbox" onchange="toggleSelectAll()">    
                                </label>
                            </th>
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                   @foreach($students as $s)
                   <tr>
                    
                   <td><img src="{{asset( $s->profile_photo)}}" alt="" class="img-fluid thumbnail" width="100px" height="100px"></td>
                       <td>{{$s->student_id}}</td>
                       <td>{{$s->center}}</td>
                       <td>{{$s->year}}</td>
                       <td>{{$s->student_name}}</td>
                       <td>{{$s->father_name}}</td>
                       <td>{{$s->contact_no}}</td>
                       <td>{{$s->gender}}</td>
                       <td>{{$s->email}}</td>
                       <td>{{$s->marital_status}}</td>
                       <td>{{$s->course->course_name}}</td>
                       <td>{{$s->course_duration}}</td>
                       <td>{{$s->date_of_birth}}</td>
                       <td>{{$s->state}}</td>
                       <td>{{$s->district}}</td>
                       <td>{{$s->date_of_admission}}</td>
                       
                      
                       <td>
                             <div style = "">
                             <!-- <a class="mx-2"  href="javascript:void(0);"><i class="bx bx-show me-1"></i></a> -->
                               <!-- <a class="mx-2" href="{{route('courses.edit',['id' => $s->id ])}}"><i class="bx bx-edit-alt me-1"></i></a> -->
                               <!-- <a class="mx-2"   href="{{route('delete-student',['id' => $s->id ])}}"><i class="bx bx-trash me-1"></i></a> -->
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