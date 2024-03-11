<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image PDF Form</title>
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
</head>
<body>

    <form action="/franchise/appricial-pdf" method="post" enctype="multipart/form-data">
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



        <button type="submit">Generate PDF</button>
    </form></body></html>