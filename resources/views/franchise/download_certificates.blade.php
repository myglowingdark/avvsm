@extends("form")
@section('title', 'Certificate List')
@section('parent-page', 'Download')
@section('page', 'Download Certificates ')
@section("form-content")

<div class="col-md text-center">
    <h4><b>Select Certificate For Download</b></h4>
    <div class="form-check form-check-inline mt-3">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" onclick="showButton('button1')">
        <label class="form-check-label" for="inlineRadio1"><b>Certificate of Appreciation</b></label>
    </div>
    <div class="form-check form-check-inline">
        <input disabled class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" onclick="showButton('button2')">
        <label class="form-check-label" for="inlineRadio2"><b>Certificate of Affiliation</b></label>
    </div>
    <div class="form-check form-check-inline">
        <input disabled class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" onclick="showButton('button3')">
        <label class="form-check-label" for="inlineRadio3"><b>Certificate</b></label>
    </div>
</div>
<!-- <div class="form-check form-check-inline">
    <input disabled class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" onclick="showButton('button2')" >
    <label class="form-check-label" for="inlineRadio2"><b>Certificate of Affiliation</b></label>
</div>
<div class="form-check form-check-inline">
    <input disabled class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" onclick="showButton('button3')" >
    <label class="form-check-label" for="inlineRadio3"><b>Certificate</b></label>
</div> -->
                        </div>


                       
   <!-- Buttons -->
<br>
<br>

<div class="mt-3" style="display:flex; justify-content:center;">
                        <!-- Button trigger modal -->
                        <button id="button1"  type="button" style="display: none;" class="btn btn-primary"  data-bs-toggle="modal"
                          data-bs-target="#modalCent">Download Certificate of Appreciation</button>
                        <!-- <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter"
                        >
                          Deposit Amount
                        </button> -->

                        <!-- Modal -->
                        <div class="modal fade" id="modalCent" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="modalCenterTitle">Download Certificate of Appreciation</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>

                                  <div class="modal-body">
                                  <form action="{{route('generate-appricial-pdf')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="image-preview">
                                        @php
                                        $targetImage = '1706624176.jpg';
                                        @endphp
                            
                                        @foreach (glob('public/images/*') as $image)
                                          @if (basename($image) === $targetImage)
                                            <!--<img src="{{ asset($image) }}" alt="Image Description" style="width: 200px; height: 200px; margin: 5px;">-->
                                            @break
                                          @endif
                                        @endforeach
                                        <?php
                             $imagePath = 'public/mainimage/ITS.png';        
                            
                                    if (file_exists($imagePath)) {
                                        $imageUrl = asset('public/mainimage/ABVSSM_logo.jpg');
                                $width = 110; // Set your desired width
                                $height = 95; // Set your desired height
                            
                                echo '<img src="' . $imageUrl . '" alt="Image" style="width: ' . $width . 'px; height: ' . $height . 'px;">';
                                        } else {
                                            echo 'Image not found';
                                        }
                                        ?>
                            
                            
                            
                            
                            
                                    </div>
                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="name" required>
                            
                                    <label for="name2">field:</label>
                                    <input type="text" id="name2" name="name2" required>
                            
                                   
                                     <label for="image">Image:</label>
                            
                                     <input type="file" id="image" name="image" accept="image/*" required>
                            
                            
                            

                                    <button type="submit" class="btn btn-primary" >Generate PDF</button>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      </div>
   <!-- <button id="button1" type="button" class="btn btn-primary" style="display: none;" fdprocessedid="okeh6p" onclick="redirectToRoute('franchise/appricial-pdf')">Download Certificate of Appreciation</button> -->
<button id="button2"  type="button" class="btn btn-primary" style="display: none;" fdprocessedid="okeh6p">Download Certificate of Affiliation</button>

<button id="button3"  type="button" class="btn btn-primary" style="display: none;" fdprocessedid="okeh6p">Download Certificate </button>
<!-- <div class="justify-content-center">
   <button id="button1" type="button" class="btn btn-primary " style="display: none; margin: 0 auto;" fdprocessedid="okeh6p" onclick="redirectToRoute('franchise/appricial-pdf')">Download Certificate of Appreciation</button>
<button id="button2"  type="button" class="btn btn-primary" style="display: none; margin: 0 auto;" fdprocessedid="okeh6p">Download Certificate of Affiliation</button> -->


<button id="button3"  type="button" class="btn btn-primary" style="display: none; margin: 0 auto;" fdprocessedid="okeh6p">Download Certificate </button>

</div>

<script>
    function showButton(buttonId) {
        // Hide all buttons first
        document.getElementById('button1').style.display = 'none';
        document.getElementById('button2').style.display = 'none';
        document.getElementById('button3').style.display = 'none';

        // Show the corresponding button
        document.getElementById(buttonId).style.display = 'block';
    }
</script>

<script>
    function redirectToRoute(route) {
        window.location.href = "{{ route('franchise-appricial-pdf') }}"; // Change '/' to the base URL of your application if needed
    }
</script>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }
        input[type="text"],
        input[type="file"]

       {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .image-preview {
            text-align: center;
            margin-bottom: 20px;
        }
        .image-preview img {
            max-width: 200px;
            height: auto;
        }
        .error-message {
            color: red;
            margin-top: 5px;
        }

    </style>

@endsection
