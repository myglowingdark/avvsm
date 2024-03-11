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
        <div class="col text-right" style="margin-left: 800px;">
            <a href="{{ route('create-franchise')}}"  class="btn btn-primary" fdprocessedid="pnohgn" >Add Franchise</a>
        </div>
    </div>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.no</th>
                          <th>profile</th>
                          <th>Franchise id</th>
                          <th>Owner Name</th>
                          <th>State</th>
                          <!-- <th>Candidate Image</th> -->
                          <th>Address</th>
                          <th>Adhar Card No</th>
                          <th>Pan Card No</th>
                          <!-- <th> Action</th> -->

                          <th>Center Address</th>
                          
                          <!-- <th>Export</th> -->
                          <!-- <th>Status</th> -->
                          <th>Center Contact No</th>
                          <th>Tenure</th>
                          <th>Adhar Card Image</th>
                          <th>Signature</th>
                          <th>Pan Card No</th>
                          <th>Pan Card</th>
                          
                          <th>Passport Photo</th>
                        <!-- <th>Action</th> -->
                        </tr>
                      </thead>


@endsection