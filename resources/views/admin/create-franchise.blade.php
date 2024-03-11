@extends("admin/adminform")
@section('title', $title)
@section('parent-page', 'Franchise Management')
@section('page', $page)
@section("adminform-content")
@if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="{{$url}}">
    @csrf
    <div class="card-body">
    <div class="d-flex align-items-start align-items-sm-center gap-4">
    <img src="{{ isset($photo) ? asset('storage/' . $photo) : asset('assets/img/avatars/1.png') }}" required alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
    
    <div class="button-wrapper">
        <label for="passport_photo" class="btn btn-primary me-2 mb-4" tabindex="0">
            <span class="d-none d-sm-block">Upload new photo</span>
            <i class="bx bx-upload d-block d-sm-none"></i>
            <input type="file" id="passport_photo" value="{{old('passport_photo')}}" name="passport_photo" class="account-file-input" hidden="" accept="image/png, image/jpeg">
             
        </label> 
        
        
        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" fdprocessedid="0wldzr" id="resetImage">
            <i class="bx bx-reset d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Reset</span>
        </button>
        
        <p class="text-muted mb-0">Allowed JPG, PNG. Max size of 2048kb</p>
        @error('passport_photo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle file input change event
        $('#passport_photo').change(function () {
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
            $('#passport_photo').val('');
        });
    });
</script>

    </div>

    <hr class="my-0">
    <div class="card-body">
        <div class="row">

            <!-- <div class="mb-3 col-md-6">

                <label for="username" class="form-label"><b>Username</b></label>

                <input class="form-control" type="text" id="username" name="username"
                    autofocus="" fdprocessedid="59y7ma" required>

            </div> -->
            

            <div class="mb-3 col-md-6">

                <label for="owner_name" class="form-label"><b> Owner Name</b><span class="text-danger">*</span></label>

                <input class="form-control" type="text" id="owner_name" name="owner_name" value="{{ old('owner_name', isset($franchise) ? $franchise->owner_name : '') }}"
                    autofocus="" fdprocessedid="59y7ma" placeholder="Enter Franchise Name" required/>
            </div>


           
            <div class="mb-3 col-md-6" {{ isset($franchise) ? 'hidden' : '' }}>

                <label for="password" class="form-label"><b>Password</b><span class="text-danger">*</span></label>

                <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="Enter Password"  {{ isset($franchise) ? '' : 'required' }}
                      aria-describedby="password"
                      value="{{ old('password', isset($franchise) ? $franchise->user->password : '') }}" 
                    />
                    <span id="togglePassword" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <!-- @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   -->
                </div>

                <!-- <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password"
                    autofocus="" fdprocessedid="59y7ma" required autocomplete="current-password">
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>

            <div class="mb-3 col-md-6" {{ isset($franchise) ? 'hidden' : '' }} >
                <label for="confirmed" class="form-label"><b>Confirm Password</b><span class="text-danger">*</span></label>
                <div class="input-group input-group-merge">
                    <input
                    value="{{ old('password_confirmation', isset($franchise) ? $franchise->user->password_confirmation : '')  }}"{{ isset($franchise) ? 'hidden' : '' }}
                    class="form-control @error('password') is-invalid @enderror"
                      type="password"
                      class="form-control"
                      id="confirmed" 
                      name="password_confirmation" 
                      placeholder="Enter Confirm Password"
                      aria-describedby="password"
                      {{ isset($franchise) ? '' : 'required' }}
                       
                      autocomplete="current-password"
                    />
                    <span id="toggleConfirmPassword" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <!-- @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   -->
                </div>
            </div>

            
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var passwordInput = document.getElementById('password');
        var togglePassword = document.getElementById('togglePassword');

        var confirmPasswordInput = document.getElementById('confirmed');
        var toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

        togglePassword.addEventListener('click', function() {
            togglePasswordVisibility(passwordInput, togglePassword);
        });

        toggleConfirmPassword.addEventListener('click', function() {
            togglePasswordVisibility(confirmPasswordInput, toggleConfirmPassword);
        });

        function togglePasswordVisibility(inputField, toggleElement) {
            if (inputField.type === 'password') {
                inputField.type = 'text';
                toggleElement.innerHTML = '<i class="bx bx-show"></i>';
            } else {
                inputField.type = 'password';
                toggleElement.innerHTML = '<i class="bx bx-hide"></i>';
            }
        }
    });
</script>

            <div class="mb-3 col-md-6">

                <label for="email" class="form-label"><b>Email ID</b><span class="text-danger">*</span></label>

                <input class="form-control" type="email" id="email" name="email" value="{{ old('email', isset($franchise) ? $franchise->user->email : '') }}"  {{ isset($franchise) ? 'disabled' : '' }}
                    placeholder="email@example.com" fdprocessedid="vquauo" required />
                    <!-- @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>

            <div class="mb-3 col-md-6">

                <label for="dob" class="form-label"><b>Date of Birth</b><span class="text-danger">*</span></label>

                <input class="form-control" type="date" name="dob" id="dob" value="{{ old('dob', isset($franchise) ? $franchise->user->dob : '') }}"
                    fdprocessedid="5tos5" required>
                    <!-- @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>

            <div class="col-md">

                <small class="text-light fw-semibold d-block"><b>Select Gender</b><span class="text-danger">*</span></small>

                <div class="form-check form-check-inline mt-3">

                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"  value="{{ (old('gender') == 'M' || (isset($franchise) && $franchise->user->gender == 'M')) ? 'checked' : 'M' }}"
                        required>

                    <label class="form-check-label" for="inlineRadio1">Male</label>

                </div>

                <div class="form-check form-check-inline">

                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="{{ (old('gender') == 'F' || (isset($franchise) && $franchise->user->gender == 'F')) ? 'checked' : 'F' }}"
                        required>

                    <label class="form-check-label" for="inlineRadio2">Female</label>

                </div>
                <div class="form-check form-check-inline">

                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="{{ (old('gender') == 'O' || (isset($franchise) && $franchise->user->gender == 'O')) ? 'checked' : 'O' }}"
                         required>

                    <label class="form-check-label" for="inlineRadio2">Other</label>

                </div>
                <!-- @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror -->
            </div>

            <div class="mb-3 col-md-6">

                <label for="contact_no" class="form-label"><b>Contact No</b><span class="text-danger">*</span></label>

                <input class="form-control" type="text" id="contact_no" name="contact_no" value="{{ old('contact_no', isset($franchise) ? $franchise->user->contact_no : '') }}"
                    placeholder="Enter Contact Number" fdprocessedid="vquauo" required>
                    <!-- @error('contact_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->

            </div>

            <div class="mb-3 col-md-6">
                <label for="center_contact_no" class="form-label"><b>Center Contact No</b><span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="center_contact_no" name="center_contact_no" value="{{ old('center_contact_no', isset($franchise) ? $franchise->center_contact_no : '') }}"
                    placeholder="Enter Center Contact Number" fdprocessedid="vquauo" required>
                    <!-- @error('center_contact_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>
            <div class="mb-3 col-md-6">
                <label for="address" class="form-label"><b>Address</b><span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="address" name="address" value="{{ old('address', isset($franchise) ? $franchise->address : '') }}"
                    placeholder="Enter Address" fdprocessedid="vquauo" required>
                    <!-- @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>

            <div class="mb-3 col-md-6">
                <label for="center_address" class="form-label"><b>Center Address</b><span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="center_address" name="center_address" value="{{ old('current_address', isset($franchise) ? $franchise->current_address : '') }}"
                    placeholder="Enter Center Address" fdprocessedid="vquauo" required>
                    <!-- @error('center_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="state"><b>State</b><span class="text-danger">*</span></label>
                <input type="text" list="state_list" name="state" placeholder="search" class="form-control" id="state" value="{{ old('state', isset($franchise) ? $franchise->state : '') }}">
                <datalist id="state_list" >
                <!-- <select id="country" name="state" class="select2 form-select" fdprocessedid="goh4ga" -->
                    <!-- required> -->
                    <option value="" disabled selected>Select State</option>
                    <option value="Andaman and Nicobar Islands">
                    <option value="Andhra Pradesh">

                    <option value="Arunachal Pradesh"></option>

                    <option value="Assam"></option>

                    <option value="Bihar"></option>

                    <option value="Chandigarh"></option>

                    <option value="Chhattisgarh"></option>

                    <option value="Dadra and Nagar Haveli"></option>

                    <option value="Daman and Diu"></option>

                    <option value="Delhi"></option>

                    <option value="Goa"></option>

                    <option value="Gujarat"></option>

                    <option value="Haryana"></option>

                    <option value="Himachal Pradesh"></option>

                    <option value="Jammu and Kashmir"></option>

                    <option value="Jharkhand"></option>

                    <option value="Karnataka"></option>

                    <option value="Kerala"></option>

                    <option value="Lakshadweep"></option>

                    <option value="Madhya Pradesh"></option>

                    <option value="Maharashtra"></option>

                    <option value="Manipur "></option>
                    <option value="Meghalaya"></option>

                    <option value="Mizoram"></option>

                    <option value="Nagaland"></option>

                    <option value="Odisha"></option>

                    <option value="Puducherry"></option>

                    <option value="Punjab"></option>

                    <option value="Rajasthan"></option>

                    <option value="Sikkim"></option>

                    <option value="Tamil Nadu"></option>

                    <option value="Telangana"></option>

                    <option value="Tripura"></option>

                    <option value="Uttarakhand"></option>

                    <option value="Uttar Pradesh"></option>

                    <option value="West Bengal"></option>

                <!-- </select> -->
                </datalist>
                <!-- @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror -->
            </div>
            <div class="mb-3 col-md-6">
                <label for="tenure" class="form-label"><b>Tenure</b><span class="text-danger">*</span></label>
                <select id="tenure" class="form-select" name="tenure" value="{{ old('tenure', isset($franchise) ? $franchise->tenure : '') }}"
                    fdprocessedid="b8xt7k" required>
                    <option value="" disabled selected>Select Tenure</option>
                    <option value="6">6 Months</option>
                    <option value="1">1 Year</option>
                    <option value="2">2 Year</option>
                    <option value="3">3 Year</option>
                    <option value="4">4 Year</option>
                    <option value="5">5 Year</option>
                </select>
                <!-- @error('tenure')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror -->
            </div>
            <div class="mb-3 col-md-6">
                <label for="adhar_card_img" class="form-label"><b>upload Aadhar</b><span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="adhar_card_img" id="adhar_card_img" accept=".pdf, .jpg,.png" 
                 value="{{ old('adhar_card', isset($franchise) ? $franchise->adhar_card : '') }}"  {{ isset($franchise) ? 'disabled' : '' }}
                    required>
                    <!-- @error('adhar_card_img')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>
            <div class="mb-3 col-md-6">
                <label for="adhar_card_no" class="form-label"><b>Aadhar card no</b><span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="adhar_card_no" id="adhar_card_no" accept=".pdf, .jpg,.png" value="{{ old('adhar_card_no', isset($franchise) ? $franchise->adhar_card_no : '') }}"  {{ isset($franchise) ? 'disabled' : '' }}
                placeholder="Enter Aadhar No."
                    required>
                    <!-- @error('adhar_card_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>
            <div class="mb-3 col-md-6">
                <label for="pan_card" class="form-label"><b>upload PAN</b><span class="text-danger">*</span></label >
                <input class="form-control" type="file" name="pan_card" id="pan_card" accept=".pdf, .jpg,.png" value="{{ old('pan_card', isset($franchise) ? $franchise->pan_card : '') }}"  {{ isset($franchise) ? 'disabled' : '' }}
                placeholder="Enter PAN No."
                    required>
                    <!-- @error('pan_card')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>
            <div class="mb-3 col-md-6">
                <label for="pan_card_no" class="form-label"><b>PAN Number</b><span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="pan_card_no" id="pan_card_no" accept=".pdf, .jpg,.png" value="{{ old('pan_card_no', isset($franchise) ? $franchise->pan_card_no : '') }}"  {{ isset($franchise) ? 'disabled' : '' }}
                    required>
                    <!-- @error('pan_card_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>
            <div class="mb-3 col-md-6">
                <label for="signature" class="form-label"><b>upload signature</b><span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="signature" id="signature" accept=".pdf, .jpg,.png" value="{{ old('signature', isset($franchise) ? $franchise->signature : '') }}"  {{ isset($franchise) ? 'disabled' : '' }}  required>
                    <!-- @error('signature')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
            </div>
        </div>
        
        <div class="mt-2 text-right">
            <button type="submit" class="btn btn-primary me-2" fdprocessedid="sqku6">
                Submit</button>
        </div>

</form>
@endsection