@extends("admin/adminform")
@section('title', ' Franchise List')
@section('parent-page', 'Franchise Management')
@section('page', ' Franchise List')
@section("adminform-content")


<div class="card">
<div class="row align-items-center">
        <div class="col">
            <h5 class="card-header">Franchise List</h5>
        </div>
        <div class="col text-right">
        <div class="d-flex justify-content-end align-items-center">
    <a href="{{ route('create-franchise')}}" class="btn btn-primary" style="margin-right: 10px;" fdprocessedid="pnohgn">Add Franchise</a>
    <button type="button" id="exportdata" class="btn btn-primary" style="display:none;"onclick="exportToExcel()">Export Selected Data</button>
</div>
        </div>
    </div>      
                
    <!-- <div class="card-body" style="display: flex; justify-content: flex-start; margin-bottom: 10px;">
    <button type="button" id="exportdata" class="btn btn-lg btn-primary" onclick="exportToExcel()" style="display: none;">Export Selected Data</button>
  
</div> -->
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.no</th>
                          <th>Profile</th>
                          <th>Franchise id</th>
                          <td>Email</td>
                          <th>Owner Name</th>
                          <th>State</th>
                          <th>Documents</th>
                          <th>Tenure</th>                                     

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
                      @foreach($franchises as $franchise)
                            <tr>
                            <td>{{$franchise->id}}</td>
                                <td>

                                    <img src="{{asset( $franchise->passport_photo)}}" alt="" class="img-fluid thumbnail" width="100px" height="100px">
</td>
                                <td>{{ $franchise->franchise_id }}</td>

                                <!-- <td>{{ $franchise->franchise_id }}</td> -->
                                <td>{{ optional($franchise->user)->email }}</td>
                                <td>{{ $franchise->owner_name }}</td>
                                <td>{{ $franchise->state }}</td>
                                <td>
                                  <a href="{{asset($franchise->adhar_card) }}" target="blank"><span class="badge bg-label-success">Adhar Card</span></a><br>
                                <a href="{{ asset($franchise->pan_card )}}" target="blank"><span class="badge bg-label-primary">Pan Card</span></a><br>
                                <a href="{{asset($franchise->signature)  }}" target="blank"><span class="badge bg-label-warning">Signature</span></a>
                              </td>
                                <!-- <td>{{ $franchise->center_address }}</td> -->

                                <!-- <td>{{ $franchise->center_contact_no }}</td> -->

                                <td>{{ $franchise->tenure }}</td>
                                
                                <td>
                                  <!-- <a class="mx-2" href="javascript:void(0);"><i class="bx bx-show me-1"></i></a> -->
                                    <a href="{{route('edit-franchise',['id' => $franchise->id ])}}" class="mx-2"><i class="bx bx-edit-alt me-1"></i></a>    
                                    <a href="{{route('delete-franchise',['id' => $franchise->id ])}}" class="mx-2 delete-franchise"><i class="bx bx-trash me-1"></i></a>    
                                </td>

                                
                               <td><input type="checkbox" onchange="toggleButtons()"></td>

  
                                  <!-- <div style = "">
                                  <a class="mx-2" href="javascript:void(0);"><i class="bx bx-show me-1"></i></a>
                                    <a class="mx-2" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i></a>
                                    <a class="mx-2" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                                  </div>  -->

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



document.addEventListener('DOMContentLoaded', function() {
  // Find all delete-franchise links
  var deleteLinks = document.querySelectorAll('.delete-franchise');

                            // Attach click event listener to each delete link
                            deleteLinks.forEach(function(link) {
                                link.addEventListener('click', function(event) {
                                    // Prevent the default action (i.e., following the link)
                                    event.preventDefault();

                                    // Get the franchise ID from data attribute
                                    var franchiseId = this.getAttribute('data-franchise-id');

                                    // Show confirmation dialog
                                    var confirmDelete = confirm('It will delete permanently. Are you sure you want to delete this franchise? ');

                                    // If user confirms deletion, redirect to the delete URL
                                    if (confirmDelete) {
                                        window.location.href = this.href;
                                    }
                                });
                            });
                        });
                    </script>
@endsection