<!DOCTYPE html>

<html lang="en">

<head>

<link href="https://fonts.googleapis.com/css2?family=Algerian&display=swap" rel="stylesheet">

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PDF Template</title>



<!-- image import   <?php echo  asset( 'public/mainimage/certificate1.png') ?> -->



    <style>

        body {

            /* background-image: url("https://pdf.glowingdark.com/public/mainimage/studentCertificate.jpg"); */

            background-image: url("<?php echo  asset( 'public/mainimage/appricial.jpg') ?>");

             background-size: contain; 

            /* font-family: Arial, sans-serif; */

            padding:0px;

            margin:10px; 

            background-repeat: no-repeat;

            font-family: 'Algerian', sans-serif; /* Use Algerian font */

            

        } 

        @page {

        margin: 0px; /* Sets all margins to 10px */





    }

    @font-face {

            font-family: 'Algerian';

            src: local('Algerian'), url('path_to_algerian_font_file.ttf') format('truetype'); /* Specify the path to the font file */

        }

        

        /* body {

            font-family: 'Algerian', sans-serif; /* Use Algerian font */

        /* } */ 

        /* .line-break {

            margin-bottom: 20px; /* Adjust the space between lines as needed */



            .line {

            margin-bottom: 10px; /* Adjust the space between lines as needed */

            text-align: center;

            font-size: 25px;

        } 

        </style>

</head>

<body>

<div class="container1">

<?php

$imagePath = 'public/images/'.$imageName ;

if (file_exists($imagePath)) {

echo '<img src="' . asset( 'public/images/'.$imageName) . '" alt="Image" style="width: 105px; height: 130px; margin-top: 450px; margin-left:330px "  >';

} else {

echo 'Image not found';

}

?> 
 <h2 style=" margin-top: 42px ; text-align: center; font-size:35px; color:seagreen; ">{{$name}}</h2><br>
</div>





   <!-- <h2 style=" margin-top: 620px ; text-align: center; font-size:30px;  ">{{$name}}</h2><br> -->

   

    
</body>

</html>