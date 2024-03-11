
@extends("form")
@section('title', 'Student Enquiry Form')
@section('parent-page', 'Student Management')
@section('page', 'Student Enquiry')
@section("form-content")
<div style="background-color: white; padding: 20px;"> <!-- Add this container -->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Student Enquiry Form</h4>


            <form id="formAccountSettings" method="POST"  action="{{route('franchise.student-enquiry-form')}}" >

             @csrf

              <div class="row">

             <div class="mb-3 col-md-6">



<label for="center" class="form-label"><b>select center</b><span class="text-danger" style="font-size: 1.5em">*</span></label>
<!-- <input class="form-control" type="text" id="center" name="center" value="{{$franchiseId}}"  autofocus="" fdprocessedid="59y7ma" placeholder="Enter Center"> -->
<select id="defaultSelect" class="form-select" name="center"
                    fdprocessedid="b8xt7k" required>
                    <option value="{{$franchiseId}}">{{$franchiseId}}</option>
                    

                </select>

</div>



<div class="mb-3 col-md-6">
    <label for="firstName" class="form-label"><b>Counselor Name</b><span class="text-danger" style="font-size: 1.5em">*</span></label>
    <input class="form-control" type="text" id="firstName" name="counselor_name" autofocus="" fdprocessedid="59y7ma" placeholder="Enter Counselor Name" required>
</div>

                <div class="mb-3 col-md-6">

                  <label for="firstName" class="form-label"><b>Candidate Name</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                  <input class="form-control" type="text" id="firstName" name="candidate_name"  autofocus="" fdprocessedid="59y7ma" placeholder="Enter Candidate Name" required>

                </div>

                <div class="mb-3 col-md-6"> 

                    <label for="lastName" class="form-label"><b>Father Name</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input class="form-control" type="text" name="father_name" id="lastName" fdprocessedid="5tos5" placeholder="Enter Father Name"  required>

                  </div>

                <div class="mb-3 col-md-6"> 

                  <label for="lastName" class="form-label"><b>Contact Number</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                  <input class="form-control" type="text" name="contact_no" id="lastName" fdprocessedid="5tos5" placeholder="Enter Contact Number"  required>

                </div>



                <div class="mb-3 col-md-6"> 

                    <label for="lastName" class="form-label"><b>WhatsApp Number</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input class="form-control" type="text" name="whatsapp_no" id="lastName" fdprocessedid="5tos5" placeholder="Enter Whatsapp Number"  required>

                  </div>



                <div class="col-md">

                    <small class="text-light fw-semibold d-block"><b>Select Gender</b><span class="text-danger" style="font-size: 1.5em">*</span></small>

                    <div class="form-check form-check-inline mt-3">

                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M">

                      <label class="form-check-label" for="inlineRadio1">Male</label>

                    </div>

                    <div class="form-check form-check-inline">

                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F">

                      <label class="form-check-label" for="inlineRadio2">Female</label>

                    </div>

                    

                </div>

                <div class="mb-3 col-md-6">

                  <label for="email" class="form-label"><b>Enter E-mail</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                  <input class="form-control" type="text" id="email" name="email" value="" placeholder="john.doe@example.com" fdprocessedid="vquauo"  required>

                </div>

                

                <div class="col-md-6">

                    <small class="text-light fw-semibold d-block"><b>Marital Status</b><span class="text-danger" style="font-size: 1.5em">*</span></small>

                    <div class="form-check form-check-inline mt-3">

                      <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio1" value="Married" >

                      <label class="form-check-label" for="inlineRadio1">Married</label>

                    </div>

                    <div class="form-check form-check-inline">

                      <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio2" value="Unmarried" >

                      <label class="form-check-label" for="inlineRadio2">Unmarried</label>

                    </div>

                    

                    

                </div>



                <div class="mb-3 col-md-6">

                    <label for="DOF" class="form-label"><b>Birth Date</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                   

                      <input class="form-control" type="date" name="birth_date" value="" id="html5-date-input"  required>

                  

                  </div>



                  <div class="mb-3 col-md-6">

                    <label for="email" class="form-label"><b>Qualification</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input class="form-control" type="text" id="email" name="qualification"  fdprocessedid="vquauo" placeholder="Enter Your Qualification"  required>

                  </div>



                  <div class="mb-3 col-md-6">

                    <label for="address" class="form-label"><b>Interested Course</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <select id="defaultSelect" class="form-select" name="interested_course" fdprocessedid="b8xt7k" required>

                    <option value="" disabled selected>Select Interested Course</option>

                            <optgroup label="Basic Courses">

                                <option value="Basic English Speaking">Basic English Speaking</option>

                                <option value="Basic Makeup Course">Basic Makeup Course</option>

                                <option value="Certificate Course In Basic Computer">Certificate Course In Basic Computer</option>

                                <option value="English Typing">English Typing</option>

                                <option value="Hindi Typing">Hindi Typing</option>

                            </optgroup>

                            <optgroup label="Intermediate Courses">

                                <option value="English (Intermediate+Basic)">English (Intermediate+Basic)</option>

                                <option value="Makeup (Intermediate+Basic)">Makeup (Intermediate+Basic)</option>

                                <option value="Certificate In Computer Concept">Certificate In Computer Concept</option>

                            </optgroup>

                            <optgroup label="Advanced Courses">

                                <option value="Advance Excel">Advance Excel</option>

                                <option value="Advance Microsoft">Advance Microsoft</option>

                                <option value="Javascript">Javascript</option>

                                <option value="HTML/DHTML">HTML/DHTML</option>

                                <option value="Data Structure">Data Structure</option>

                                <option value="AUTOCAD">AUTOCAD</option>

                            </optgroup>

                            <optgroup label="Designing">

                                <option value="Corel Draw">Corel Draw</option>

                                <option value="Adobe Photoshop">Adobe Photoshop</option>

                                <option value="DTP">DTP</option>

                                <option value="DTP (Page Maker, Photoshop, Coreldraw)">DTP (Page Maker, Photoshop, Coreldraw)</option>

                                <option value="Certificate In Image Editing">Certificate In Image Editing</option>

                                <option value="Certificate In 2D Animation">Certificate In 2D Animation</option>

                                <option value="Designing">Designing</option>

                            </optgroup>

                            <optgroup label="Business and Finance">

                                <option value="Certificate In GST">Certificate In GST</option>

                                <option value="Tally">Tally</option>

                                <option value="BUSY">BUSY</option>

                                <option value="Certificate In Tally GST">Certificate In Tally GST</option>

                                <option value="Tally With Accounting">Tally With Accounting</option>

                                <option value="Certificate In Accounting">Certificate In Accounting</option>

                                <option value="Certificate In Marketing">Certificate In Marketing</option>

                            </optgroup>

                            <optgroup label="Software Development">

                                <option value="Certificate Course PHP">Certificate Course PHP</option>

                                <option value="Data Entry Operations">Data Entry Operations</option>

                                <option value="Internet & Online Work">Internet & Online Work</option>

                                <option value="Certificate In Computer Concept">Certificate In Computer Concept</option>

                                <option value="Certificate In GST">Certificate In GST</option>

                            </optgroup>

                            <optgroup label="Beauty and Personal Care">

                                <option value="Makeup Course With Hair Cutting">Makeup Course With Hair Cutting</option>

                                <option value="Beautician Therapy">Beautician Therapy</option>

                                <option value="Diploma (Basic) Makeup & Hairstyle">Diploma (Basic) Makeup & Hairstyle</option>

                                <option value="Basic To Advance (Makeup Course)">Basic To Advance (Makeup Course)</option>

                            </optgroup>

                            <optgroup label="Others">

                                <option value="Certificate In Personality Development">Certificate In Personality Development</option>

                                <option value="Certificate In 2D Animation">Certificate In 2D Animation</option>

                                <option value="Computer Hardware">Computer Hardware</option>

                                <option value="Diploma Mobile Repairing & Software Installation">Diploma Mobile Repairing & Software Installation</option>

                                <option value="Diploma (Editing Expert)">Diploma (Editing Expert)</option>

                            </optgroup>



                        <!-- <option value="1">2024</option>

                        <option value="2">2023</option>

                        <option value="3">2022</option> -->

                        </select>

                  </div>

                  

                  <div class="mb-3 col-md-6">

                    <label for="address" class="form-label"><b>Interested Course Duration</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input type="text" class="form-control" id="address" name="interested_course_duration" placeholder="Interested Course Duration" fdprocessedid="sr2g7d" placeholder="Course Duration"  required>

                    

                  </div>



                  <div class="mb-3 col-md-6">

                    <label for="address" class="form-label"><b>Suggested Course</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input type="text" class="form-control" id="address" name="suggested_course" placeholder="Enter Suggest Course" fdprocessedid="sr2g7d" placeholder="Suggest a Course"  required>

                  </div>

                  

                  <div class="mb-3 col-md-6">

                    <label for="address" class="form-label"><b>Suggested Course Duration</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input type="text" class="form-control" id="address" name="suggested_course_duration" placeholder="Suggest Course Duration" fdprocessedid="sr2g7d"  required>

                  </div>



                  <div class="mb-3 col-md-6">

                    <label for="address" class="form-label"><b>Actual Fee</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input type="text" class="form-control" id="address" name="course_fee" placeholder="Enter course Fee" fdprocessedid="sr2g7d"  required>

                  </div>



                  <div class="mb-3 col-md-6">

                    <label for="address" class="form-label"><b>After Discounted Fee</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input type="text" class="form-control" id="address" name="discount_fee" placeholder="Enter After Descount Fee" fdprocessedid="sr2g7d"  required>

                  </div>





                <div class="mb-3 col-md-6">

                    <label class="form-label" for="country"><b>State</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <select id="country" class="select2 form-select"  name="state"

                     fdprocessedid="goh4ga"  required>

                      <option value="">Select</option>

      <option value="AN">Andaman and Nicobar Islands</option>

      <option value="AP">Andhra Pradesh</option>

      <option value="AR">Arunachal Pradesh</option>

      <option value="AS">Assam</option>

      <option value="BR">Bihar</option>

      <option value="CH">Chandigarh</option>

      <option value="CT">Chhattisgarh</option>

      <option value="DN">Dadra and Nagar Haveli</option>

      <option value="DD">Daman and Diu</option>

      <option value="DL">Delhi</option>

      <option value="GA">Goa</option>

      <option value="GJ">Gujarat</option>

      <option value="HR">Haryana</option>

      <option value="HP">Himachal Pradesh</option>

      <option value="JK">Jammu and Kashmir</option>

      <option value="JH">Jharkhand</option>

      <option value="KA">Karnataka</option>

      <option value="KL">Kerala</option>

      <option value="LD">Lakshadweep</option>

      <option value="MP">Madhya Pradesh</option>

      <option value="MH">Maharashtra</option>

      <option value="MN">Manipur</option>

      <option value="ML">Meghalaya</option>

      <option value="MZ">Mizoram</option>

      <option value="NL">Nagaland</option>

      <option value="OR">Odisha</option>

      <option value="PY">Puducherry</option>

      <option value="PB">Punjab</option>

      <option value="RJ">Rajasthan</option>

      <option value="SK">Sikkim</option>

      <option value="TN">Tamil Nadu</option>

      <option value="TS">Telangana</option>

      <option value="TR">Tripura</option>

      <option value="UK">Uttarakhand</option>

      <option value="UP">Uttar Pradesh</option>

      <option value="WB">West Bengal</option>

                    </select>

                  </div>





                  <div class="mb-3 col-md-6">

                    <label for="district" class="form-label"><b>District</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input class="form-control" type="text" id="district" name="district" placeholder="Enter District " fdprocessedid="zlamfx"  required>

                  </div>





                <div class="mb-3 col-md-6">

                    <label for="address" class="form-label"><b>Pin Code</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input type="text" class="form-control" id="address" name="pincode" placeholder="Enter PinCode" fdprocessedid="sr2g7d"  required>

                  </div>





                  <div class="mb-3 col-md-6">

                    <label for="address" class="form-label"><b>Address</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" fdprocessedid="sr2g7d"  required>

                  </div>

                 

                  

                

                

                  <div class="mb-3 col-md-6">

                    <label for="address" class="form-label"><b>Remark</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                    <input type="text" class="form-control" id="address" name="remark" placeholder="" fdprocessedid="sr2g7d"  required>

                  </div>

                

                

                <div class="mb-3 col-md-6">

                    <label for="zipCode" class="form-label"><b>Date of Enquiry</b><span class="text-danger" style="font-size: 1.5em">*</span></label>

                   

                      <input class="form-control" type="date" name="date_of_enquiry" value="2021-06-18" id="html5-date-input"  required>

                  

                  </div>

                

              </div>

             

              <div class="mt-2">

                <button type="submit" class="btn btn-primary me-2" fdprocessedid="sqku6">Submit</button>

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