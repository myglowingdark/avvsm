@extends("admin/adminform")
@section('title', 'View Students')
@section('parent-page', 'Student Management')
@section('page', 'View Student')
@section("adminform-content")


<div class="card">
                <!-- <h5 class="card-header">View Enquiry Students List</h5> -->
                <div class="row align-items-center">
        <div class="col">
            <h5 class="card-header">Student Enquiry List</h5>
        </div>
        <div class="col text-center">
            <!-- Search input field -->
            <div class="form-group">
                <input type="text" id="searchInput" class="form-control border border-dark shadow-none pr-5" style="width: 300px;" placeholder="Search By center,Counselor Name, Candidate Name" aria-label="Search...">
                <!-- Search icon -->
                <!-- <i class="bx bx-search fs-4 lh-0 position-absolute top-50 end-0 translate-middle-y me-2"></i> -->
            </div>
        </div>
        <div class="col text-right">
        <div class="d-flex justify-content-end align-items-center">
   
    <button type="button" id="exportdata" class="btn btn-primary" style="display:none;"onclick="exportToExcel()">Export Selected Data</button>
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
                            </label>
                        </th>
                        <th>Sr.No</th>
                        <th>Center</th>
                        
                        <th>Counselor Name</th>
                        <th>Candidate Name</th>
                        <th>Contact No</th>
                        <th>Interested Course</th>
                        <th>Suggested Course</th>
                        <th>Admission</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enquiryForms as $enquiryForm)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $enquiryForm->id }}</strong></td>
                        <td>{{ $enquiryForm->center }}</td>
                        <td>{{ $enquiryForm->counselor_name }}</td>
                        <td>{{ $enquiryForm->candidate_name }}</td>
                        <td>{{ $enquiryForm->contact_no }}</td>
                        <td>{{ $enquiryForm->interested_course }}</td>
                        <td>{{ $enquiryForm->suggested_course }}</td>
                        <td><span class="badge bg-label-success me-1">Pending</span></td>
                        <td>
                            <div>
                                <a class="mx-2" href="javascript:void(0);"><i class="bx bx-show me-1"></i></a>
                                <a class="mx-2" href="{{ route('edit-enquiry-form', $enquiryForm->id) }}"><i class="bx bx-edit-alt me-1"></i></a>
                                <a class="mx-2" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                            </div>
                        </td>
                    </tr>
                
                    @endforeach
                </tbody>
            </table>
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

 <script>

  
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector(".table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            tdCenter = tr[i].getElementsByTagName("td")[2]; // Index 2 for Center
            tdCounselor = tr[i].getElementsByTagName("td")[3]; // Index 3 for Counselor Name
            tdCandidate = tr[i].getElementsByTagName("td")[4]; // Index 4 for Candidate Name
            if (tdCenter || tdCounselor || tdCandidate) {
                txtValueCenter = tdCenter.textContent || tdCenter.innerText;
                txtValueCounselor = tdCounselor.textContent || tdCounselor.innerText;
                txtValueCandidate = tdCandidate.textContent || tdCandidate.innerText;
                if (txtValueCenter.toUpperCase().indexOf(filter) > -1 ||
                    txtValueCounselor.toUpperCase().indexOf(filter) > -1 ||
                    txtValueCandidate.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Bind searchTable function to keyup event on searchInput
    document.getElementById("searchInput").addEventListener("keyup", searchTable);


</script>




@endsection