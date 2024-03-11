
@extends("form")

@section('title', 'Enroll Student')
@section('parent-page', 'Student Management')
@section('page', 'Enroll Student') 
@section("form-content")
<!-- <h5 class="card-header">Add New Student</h5> -->
@if($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="{{route('create-student')}}">
    @csrf
    <div class="card-body">

    <div class="d-flex align-items-start align-items-sm-center gap-4">
    <img src="{{ isset($photo) ? asset('storage/' . $photo) : asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
    
    <div class="button-wrapper">
        <label for="upload_photo" class="btn btn-primary me-2 mb-4" tabindex="0">
            <span class="d-none d-sm-block">Upload new photo</span>
            <i class="bx bx-upload d-block d-sm-none"></i>
            <input type="file" id="upload_photo" name="upload_photo" class="account-file-input" hidden="" accept="image/png, image/jpeg">
        </label>
        
        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" fdprocessedid="0wldzr" id="resetImage">
            <i class="bx bx-reset d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Reset</span>
        </button>
        
        <p class="text-muted mb-0">Allowed JPG, PNG. Max size of 800K</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle file input change event
        $('#upload_photo').change(function () {
            var file = this.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#uploadedAvatar').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Handle reset button click event
        $('#resetImage').click(function () {
            // Set the image source back to the default image
            $('#uploadedAvatar').attr('src', "{{asset('assets/img/avatars/1.png')}}");
            // Clear the file input
            $('#upload_photo').val('');
        });
    });
</script>



    </div>

    <hr class="my-0">
    <div class="card-body">
        <div class="row">

            <div class="mb-3 col-md-6">

                <label for="selectcenter" class="form-label"><b>select center</b><span class="text-danger">*</span></label>
              
                <select id="defaultSelect" class="form-select" name="center"
                    fdprocessedid="b8xt7k" required>
                  
                    <option value="{{ $franchiseId }}">{{ $franchiseId}}</option>
               
                </select>

            </div>

            <div class="mb-3 col-md-6">

                <label for="selectyear" class="form-label"><b> Select Year</b><span class="text-danger">*</span></label>

                <select id="selectyear" class="form-select" name="year" fdprocessedid="b8xt7k"
                    required>
                    <option value="" disabled selected>Select Year</option>


                    <option value="1">2024</option>

                    <option value="2">2023</option>

                    <option value="3">2022</option>

                </select>

            </div>

            <div class="mb-3 col-md-6">

                <label for="firstName" class="form-label"><b>Student Name</b><span class="text-danger">*</span></label>

                <input class="form-control" type="text" id="firstName" name="student_name"
                    autofocus="" fdprocessedid="59y7ma" placeholder="Enter Student Name" required>

            </div>

            <div class="mb-3 col-md-6">

                <label for="lastName" class="form-label"><b>Father Name</b><span class="text-danger">*</span></label>

                <input class="form-control" type="text" name="father_name" id="lastName"
                    fdprocessedid="5tos5" placeholder="Enter Father Name" required>

            </div>
            <div class="mb-3 col-md-6">

                <label for="lastName" class="form-label"><b>Contact No</b><span class="text-danger">*</span></label>
                
                <input class="form-control" type="text" name="contact_no" id="lastName"
                    fdprocessedid="5tos5" placeholder="Enter Contact No" required>
                
                </div>

            <div class="col-md">

                <small class="text-light fw-semibold d-block"><b>Select Gender</b><span class="text-danger">*</span></small>

                <div class="form-check form-check-inline mt-3">

                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                        value="M" required>

                    <label class="form-check-label" for="inlineRadio1">Male</label>

                </div>

                <div class="form-check form-check-inline">

                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                        value="F" required>

                    <label class="form-check-label" for="inlineRadio2">Female</label>

                </div>



            </div>

            <div class="mb-3 col-md-6">

                <label for="email" class="form-label"><b>Enter E-mail</b><span class="text-danger">*</span></label>

                <input class="form-control" type="text" id="email" name="email"
                    placeholder="john.doe@example.com" fdprocessedid="vquauo" required>

            </div>



            <div class="col-md-6">

                <small class="text-light fw-semibold d-block"><b>Marital Status</b><span class="text-danger">*</span></small>

                <div class="form-check form-check-inline mt-3">

                    <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio1"
                        value="Married" required>

                    <label class="form-check-label" for="inlineRadio1">Married</label>

                </div>

                <div class="form-check form-check-inline">

                    <input class="form-check-input" type="radio" name="marital_status" id="inlineRadio2"
                        value="Unmarried" required>

                    <label class="form-check-label" for="inlineRadio2">Unmarried</label>

                </div>





            </div>

            <div class="mb-3 col-md-6">

                <label for="defaultSelect" class="form-label"><b> Select Course Duration</b><span class="text-danger">*</span></label>

                <select id="defaultSelect" class="form-select" name="course_duration"
                    fdprocessedid="b8xt7k" required>


                    <option value="" disabled selected>Select Course Duration</option>
                    <option value="0">0 Months</option>

                    <option value="1">1 Month</option>

                    <option value="2">2 Months</option>

                    <option value="3">3 Months</option>

                    <option value="6">6 Months</option>

                    <option value="9">9 Months</option>

                    <option value="12">12 Months</option>

                    <option value="18">18 Months</option>

                    <option value="24">24 Months</option>



                </select>

            </div>

            <div class="mb-3 col-md-6">

                <label for="address" class="form-label"><b>Address</b><span class="text-danger">*</span></label>

                <input type="text" class="form-control" id="address" name="address"
                    placeholder="Enter Address" fdprocessedid="sr2g7d" required>

            </div>



            <div class="mb-3 col-md-6">

                <label for="selectcourse" class="form-label"><b> Select Courses</b><span class="text-danger">*</span></label>
                <select id="defaultSelect" class="form-select" name="course"
                    fdprocessedid="b8xt7k" required>

                    <option value="" disabled selected>Select Course</option>
                    @foreach($courseData as $course)
                    <option value="{{ $course['id'] }}">{{ $course['course_name'] }}</option>
                @endforeach

                </select>

            </div>



            <div class="mb-3 col-md-6">

                <label for="DOB" class="form-label"><b>Birth Date</b><span class="text-danger">*</span></label>



                <input class="form-control" type="date" name="birth_date" value=""
                    id="html5-date-input" required>



            </div>

            <div class="mb-3 col-md-6">

                <label class="form-label" for="country"><b>State</b><span class="text-danger">*</span></label>

                <select id="country" name="state" class="select2 form-select" fdprocessedid="goh4ga"
                    required>

                    <option value="" disabled selected>Select State</option>

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

                <label for="district" class="form-label"><b>District</b><span class="text-danger">*</span></label>

                <input class="form-control" type="text" id="district" name="district"
                    placeholder="Enter District" fdprocessedid="zlamfx" required>

            </div>



            <div class="mb-3 col-md-6">

                <label for="zipCode" class="form-label"><b>Date of Admission</b><span class="text-danger">*</span></label>



                <input class="form-control" type="date" name="date_of_admission" value=""
                    id="html5-date-input" required>



            </div>

            <div class="mb-3 col-md-6">

                <label for="formFile" class="form-label"><b>upload signature</b><span class="text-danger">*</span></label>

                <input class="form-control" type="file" name="upload_signature" id="formFile"
                    required>

                @if(isset($signature))

                <img src="{{ asset('storage/' . $signature) }}" alt="Uploaded Signature">

                @endif

            </div>

        </div>
        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">

            <label class="form-check-label" for="defaultCheck1"> I accept the Terms and Conditions: 
                <br>
                <b>
                    I, hereby declare that, I agree to abide by the rules and regulations of ABVSSM
                    and also to the decision of the Registration authority, regarding my eligibility
                    for filling the registration form of ABVSSM courses. I declare that the
                    particulars filled in the registration form are true to the best of my knowledge
                    & belief. I have noted that the Registration Authority has the right to withhold
                    my examination application or result, in addition to any other action as may be
                    deemed fit in the event of any of the statement(s) made by me in the exam
                    form/above being found incorrect.
                </b></label>



        </div><br>

        <div class="mt-2 text-right">

            <button type="submit" class="btn btn-primary me-2" fdprocessedid="sqku6">I agree and
                Proceed</button>
        </div>

</form>
@endsection