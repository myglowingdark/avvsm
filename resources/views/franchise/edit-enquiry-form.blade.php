
@extends("form")
@section("form-content")
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> -->

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <!-- <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
          </li> -->
         
        </ul>
        <div class="card mb-4">
          <h5 class="card-header" style="background-color:rgb(172, 230, 234);"> Edit Student Enquiry Form</h5>
         
          <hr class="my-0">
          <div class="card-body">
            <form id="formAccountSettings" method="POST"  action="{{route('update-enquiry-form', $enquiryForm->id)}}" >
            @csrf
            @method('PUT')
              <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="selectcenter" class="form-label"><b>select center</b></label>
                    <input class="form-control" type="text" name="selectcenter" value="{{ $enquiryForm->selectcenter }}" id="selectcenter"  fdprocessedid="5tos5">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label"><b>Counselor Name</b></label>
                    <input class="form-control" type="text" id="firstName" name="counselorname" value="{{ $enquiryForm->counselorname }}"  autofocus="" fdprocessedid="59y7ma">
                  </div>
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label"><b>Candidate Name</b></label>
                  <input class="form-control" type="text" id="firstName" name="candidatename" 
                   autofocus=""   value="{{ $enquiryForm->candidatename }}" fdprocessedid="59y7ma">
                </div>
                <div class="mb-3 col-md-6"> 
                    <label for="lastName" class="form-label"><b>Father Name</b></label>
                    <input class="form-control" type="text" name="fathername" value="{{ $enquiryForm->fathername }}" id="lastName" fdprocessedid="5tos5">
                  </div>
                <div class="mb-3 col-md-6"> 
                  <label for="lastName" class="form-label"><b>Contact Number</b></label>
                  <input class="form-control" type="text" name="contact" value="{{ $enquiryForm->contact }}" id="lastName" fdprocessedid="5tos5">
                </div>

                <div class="mb-3 col-md-6"> 
                    <label for="lastName" class="form-label"><b>WhatsApp Number</b></label>
                    <input class="form-control" type="text" name="whatsappno" value="{{ $enquiryForm->whatsappno }}" id="lastName" fdprocessedid="5tos5">
                  </div>

                <div class="col-md">
                    <small class="text-light fw-semibold d-block"><b>Select Gender</b></small>
                    <div class="form-check form-check-inline mt-3">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male"  {{ $enquiryForm->gender == 'Male' ? 'checked' : '' }} >
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" {{ $enquiryForm->gender == 'Female' ? 'checked' : '' }} >
                      <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                    
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label"><b>Enter E-mail</b></label>
                  <input class="form-control" type="text" id="email" name="email" value="{{ $enquiryForm->email }}" value="john.doe@example.com" placeholder="john.doe@example.com" fdprocessedid="vquauo">
                </div>
                
                <div class="col-md-6">
                    <small class="text-light fw-semibold d-block"><b>Marital Status</b></small>
                    <div class="form-check form-check-inline mt-3">
                      <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio1" value="Married"   {{ $enquiryForm->marital_status == 'Married' ? 'checked' : '' }}>
                      <label class="form-check-label" for="inlineRadio1">Married</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio2" value="Unmarried"  {{ $enquiryForm->marital_status == 'Unmarried' ? 'checked' : '' }}>
                      <label class="form-check-label" for="inlineRadio2">Unmarried</label>
                    </div>
                    
                    
                </div>

                <div class="mb-3 col-md-6">
                    <label for="DOF" class="form-label"><b>Birth Date</b></label>
                   
                      <input class="form-control" type="date" name="birth_date" value="{{ $enquiryForm->birth_date }}" value="2021-06-18" id="html5-date-input">
                  
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label"><b>Qualification</b></label>
                    <input class="form-control" type="text" id="email" name="qualification"  value="{{ $enquiryForm->qualification }}"          fdprocessedid="vquauo">
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label"><b>Interested Course</b></label>
                    <input type="text" class="form-control" id="address" name="interested_course" value="{{ $enquiryForm->interested_course }}"placeholder="" fdprocessedid="sr2g7d">
                  </div>
                  
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label"><b>Interested Course Duration</b></label>
                    <input type="text" class="form-control" id="address" name="interested_course_duration" value="{{ $enquiryForm->interested_course_duration }}"placeholder="" fdprocessedid="sr2g7d">
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label"><b>Suggested Course</b></label>
                    <input type="text" class="form-control" id="address" name="suggested_course" value="{{ $enquiryForm->suggested_course }}"placeholder="" fdprocessedid="sr2g7d">
                  </div>
                  
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label"><b>Suggested Course Duration</b></label>
                    <input type="text" class="form-control" id="address" name="suggested_course_duration" value="{{ $enquiryForm->suggested_course_duration }}" placeholder="" fdprocessedid="sr2g7d">
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label"><b>Actual Fee</b></label>
                    <input type="text" class="form-control" id="address" name="actualfee" value="{{ $enquiryForm->actualfee }}" placeholder="" fdprocessedid="sr2g7d">
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label"><b>After Discounted Fee</b></label>
                    <input type="text" class="form-control" id="address" name="afterdiscountfee" value="{{ $enquiryForm->afterdiscountfee }}"placeholder="" fdprocessedid="sr2g7d">
                  </div>


                <div class="mb-3 col-md-6">
                    <label class="form-label" for="country"><b>State</b></label>
                    <select id="country" class="select2 form-select"  name="state"
                     fdprocessedid="goh4ga">
                      <option value="">Select</option>
                      <option value="AN" @if($enquiryForm->state == "AN") selected @endif>Andaman and Nicobar Islands</option>
        <option value="AP" @if($enquiryForm->state == "AP") selected @endif>Andhra Pradesh</option>
        <option value="AR" @if($enquiryForm->state == "AR") selected @endif>Arunachal Pradesh</option>
        <option value="AS" @if($enquiryForm->state == "AS") selected @endif>Assam</option>
        <option value="BR" @if($enquiryForm->state == "BR") selected @endif>Bihar</option>
        <option value="CH" @if($enquiryForm->state == "CH") selected @endif>Chandigarh</option>
        <option value="CT" @if($enquiryForm->state == "CT") selected @endif>Chhattisgarh</option>
        <option value="DN" @if($enquiryForm->state == "DN") selected @endif>Dadra and Nagar Haveli</option>
        <option value="DD" @if($enquiryForm->state == "DD") selected @endif>Daman and Diu</option>
        <option value="DL" @if($enquiryForm->state == "DL") selected @endif>Delhi</option>
        <option value="GA" @if($enquiryForm->state == "GA") selected @endif>Goa</option>
        <option value="GJ" @if($enquiryForm->state == "GJ") selected @endif>Gujarat</option>
        <option value="HR" @if($enquiryForm->state == "HR") selected @endif>Haryana</option>
        <option value="HP" @if($enquiryForm->state == "HP") selected @endif>Himachal Pradesh</option>
        <option value="JK" @if($enquiryForm->state == "JK") selected @endif>Jammu and Kashmir</option>
        <option value="JH" @if($enquiryForm->state == "JH") selected @endif>Jharkhand</option>
        <option value="KA" @if($enquiryForm->state == "KA") selected @endif>Karnataka</option>
        <option value="KL" @if($enquiryForm->state == "KL") selected @endif>Kerala</option>
        <option value="LD" @if($enquiryForm->state == "LD") selected @endif>Lakshadweep</option>
        <option value="MP" @if($enquiryForm->state == "MP") selected @endif>Madhya Pradesh</option>
        <option value="MH" @if($enquiryForm->state == "MH") selected @endif>Maharashtra</option>
        <option value="MN" @if($enquiryForm->state == "MN") selected @endif>Manipur</option>
        <option value="ML" @if($enquiryForm->state == "ML") selected @endif>Meghalaya</option>
        <option value="MZ" @if($enquiryForm->state == "MZ") selected @endif>Mizoram</option>
        <option value="NL" @if($enquiryForm->state == "NL") selected @endif>Nagaland</option>
        <option value="OR" @if($enquiryForm->state == "OR") selected @endif>Odisha</option>
        <option value="PY" @if($enquiryForm->state == "PY") selected @endif>Puducherry</option>
        <option value="PB" @if($enquiryForm->state == "PB") selected @endif>Punjab</option>
        <option value="RJ" @if($enquiryForm->state == "RJ") selected @endif>Rajasthan</option>
        <option value="SK" @if($enquiryForm->state == "SK") selected @endif>Sikkim</option>
        <option value="TN" @if($enquiryForm->state == "TN") selected @endif>Tamil Nadu</option>
        <option value="TS" @if($enquiryForm->state == "TS") selected @endif>Telangana</option>
        <option value="TR" @if($enquiryForm->state == "TR") selected @endif>Tripura</option>
        <option value="UK" @if($enquiryForm->state == "UK") selected @endif>Uttarakhand</option>
        <option value="UP" @if($enquiryForm->state == "UP") selected @endif>Uttar Pradesh</option>
        <option value="WB" @if($enquiryForm->state == "WB") selected @endif>West Bengal</option>
                    </select>
                  </div>


                  <div class="mb-3 col-md-6">
                    <label for="district" class="form-label"><b>District</b></label>
                    <input class="form-control" type="text" id="district" name="district" value="{{ $enquiryForm->district }}" placeholder=" " fdprocessedid="zlamfx">
                  </div>


                <div class="mb-3 col-md-6">
                    <label for="address" class="form-label"><b>Pin Code</b></label>
                    <input type="text" class="form-control" id="address" name="pincode" value="{{ $enquiryForm->pincode }}" placeholder="411027" fdprocessedid="sr2g7d">
                  </div>


                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label"><b>Address</b></label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $enquiryForm->address }}" placeholder="" fdprocessedid="sr2g7d">
                  </div>
                 
                  
                
                
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label"><b>Remark</b></label>
                    <input type="text" class="form-control" id="address" name="remark" value="{{ $enquiryForm->remark }}" placeholder="" fdprocessedid="sr2g7d">
                  </div>
                
                
                <div class="mb-3 col-md-6">
                    <label for="zipCode" class="form-label"><b>Date of Enquiry</b></label>
                   
                      <input class="form-control" type="date" name="date_of_enquiry" value="{{ $enquiryForm->date_of_enquiry }}" value="2021-06-18" id="html5-date-input">
                  
                  </div>
                
              </div>
             
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2" fdprocessedid="sqku6">Update</button>
                <!-- <button type="reset" class="btn btn-outline-secondary" fdprocessedid="0uaq5">Cancel</button> -->
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
        
      </div>
    </div>
  </div>
  @endsection