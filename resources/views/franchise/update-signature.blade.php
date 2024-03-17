@extends("form")
@section('title', 'Update Signature')
@section('parent-page', 'Manage Profile')
@section('page', 'Update') 
@section("form-content")

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Forgot Password -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('/mainimage/ABVSSM_logo.jpg') }}" width="55" viewBox="0 0 25 42" />
                            </span>
                        </a>
                    </div>
                   
                    <!-- /Logo -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12"> <!-- Increase column width for large screens -->
                            @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif    
                            @foreach($franchises as $franchise)
                                   
                                    @if($franchise->franchise_id == auth()->user()->username)
                                        <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">    
                                            @csrf
                                            <div class="form-group row align-items-center">
                                                <label for="signature" class="col-md-4 col-form-label text-md-right">Current Signature</label>
                                                <div class="col-md-4">
                                                    <img id="current_signature" src="{{ asset($franchise->signature) }}" alt="Current Signature" width="180" height="100"><br>
                                                    <br> 
                                                </div>
                                            </div><br>
                                            <div class="form-group row">
                                                <label for="new_signature" class="col-md-4 col-form-label text-md-right">Choose New</label>
                                                <div class="col-md-8"> 
                                                    <input id="signature" type="file" class="form-control" name="signature" value= "{{asset($franchise->signature)}}"onchange="readURL(this, 'current_signature');">
                                                </div>
                                            </div> 
                                            <br>
                                            <div class="form-group row align-items-center">
                                                <label for="passport_photo" class="col-md-4 col-form-label text-md-right">Current Photo</label>
                                                <div class="col-md-4">
                                                    <img id="current_photo" src="{{ asset($franchise->passport_photo) }}" alt="Current Passport Photo" width="180" height="100">
                                                </div>
                                            </div><br>
                                            <div class="form-group row">
                                                <label for="new_passport_photo" class="col-md-4 col-form-label text-md-right">Choose New</label>
                                                <div class="col-md-8"> <!-- Adjust column width to take full width -->
                                                    <input id="new_passport_photo" type="file" class="form-control" name="passport_photo" value= "{{asset($franchise->passport_photo)}}" onchange="readURL(this, 'current_photo');" >
                                                </div>
                                            </div><br>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function readURL(input, target) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + target).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
