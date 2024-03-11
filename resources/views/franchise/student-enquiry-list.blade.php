@extends("form")
@section('title', 'Student Enquiry List')
@section('parent-page', 'Student Management')
@section('page', 'Student Enquiry List')
@section("form-content")
<!-- <div class="card">
    <h5 class="card-header">Students Enquiry List</h5>
    <div> -->
        <!-- Add id attribute to the export button -->
        <!-- <button type="button" id="exportButton" class="btn btn-lg btn-primary" fdprocessedid="fdyzc7" onclick="exportToExcel()" style="display:none;">Enquiry Form Export</button>
    </div> -->

    <div class="row align-items-center">
        <div class="col">
            <h5 class="card-header">Students Enquiry List</h5>
        </div>
        <div class="col text-right">
        <div class="d-flex justify-content-end align-items-center">
    <a href="{{route('franchise.student-enquiry-form')}}" class="btn btn-primary" style="margin-right: 10px;" fdprocessedid="pnohgn">Add Enquiry</a>
    <button type="button" id="exportButton" class="btn btn-primary" onclick="exportToExcel()" style="display:none;">Export Selected Data</button>
</div>
        </div>
</div>

    <!-- ------------------- -->
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
                        <th>Counselor Name</th>
                        <th>Center</th>
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
                    @if (auth()->check() && auth()->user()->username == $enquiryForm->center)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $enquiryForm->id }}</strong></td>
                        <td>{{ $enquiryForm->center }}</td>
                        <td>{{ $enquiryForm->counselor_name }}</td>
                        <td>{{ $enquiryForm->candidate_name }}</td>
                        <td>{{ $enquiryForm->contact_no }}</td>
                        <td>{{ $enquiryForm->interested_course }}</td>
                        <td>{{ $enquiryForm->suggested_course }}</td>
                        <td><span class="badge bg-label-success me-1">Completed</span></td>
                        <td>
                            <div>
                                <a class="mx-2" href="javascript:void(0);"><i class="bx bx-show me-1"></i></a>
                                <a class="mx-2" href="{{ route('edit-enquiry-form', $enquiryForm->id) }}"><i class="bx bx-edit-alt me-1"></i></a>
                                <a class="mx-2" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                            </div>
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
        headers.push(text);
    });
    ws_data.push(headers);
    rows.forEach(function(row) {
        var checkbox = row.querySelector('input[type="checkbox"]');
        if (checkbox.checked) {
            var row_data = [];
            row.querySelectorAll('td').forEach(function(cell, index) {
                var text = cell.textContent.trim();
                if (index !== 0) { // Exclude the checkbox column
                    row_data.push(text);
                }
            });
            ws_data.push(row_data);
        }
    });
    if (ws_data.length > 1) {
        var ws = XLSX.utils.aoa_to_sheet(ws_data);
        wb.Sheets['Selected Data'] = ws;
        XLSX.writeFile(wb, 'selected_data.xlsx');
    } else {
        alert("Please select at least one row to export.");
    }
}

    document.addEventListener('DOMContentLoaded', function() {
        var checkboxes = document.querySelectorAll('td input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('click', toggleExportButton);
        });
    });
</script>
@endsection
