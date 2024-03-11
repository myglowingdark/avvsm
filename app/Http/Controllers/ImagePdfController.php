<?php



namespace App\Http\Controllers;



use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;






use Illuminate\Support\Facades\Response;







class ImagePdfController extends Controller

{

    public function imagePdfForm()

    {

        return view('franchise.image_pdf_form');

    }



    public function generatePdf2(Request $request)

            {

                $request->validate([

                    'name' => 'required|string',

                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

                    'course' => 'required|string',

                    'dateOfIssue' => 'required|date',

                    'grade' => 'required|string',

                   'enrollmentNo' => 'required|string',

                    'certificateNo' => 'required|string',

                ]);

            

                // Get the uploaded file

                $image = $request->file('image');

            

                // Get the file extension

                $extension = $image->extension();

            

                // Get the MIME type

                $mimeType = $image->getMimeType();

            

                // Debugging

                // dd($extension, $mimeType);

            

                // Move the uploaded image to the public/images directory

                $imageName = time().'.'.$extension;

                $image->move(public_path('images'), $imageName);

            

                $name = $request->name;

                $course = $request->course;

                $startDate= $request->startDate;

               $endDate = $request->endDate;

               $dateOfIssue = $request->dateOfIssue;

              $grade = $request->grade;

              $enrollmentNo = $request->enrollmentNo;

              $certificateNo = $request->certificateNo;

            

                // Create PDF

                $options = new Options();

                $options->set('isHtml5ParserEnabled', true);

                $options->set('isRemoteEnabled', true);

                $dompdf = new Dompdf($options);

            

                $html = view('pdf_template', compact('name', 'imageName', 'course','startDate','endDate','dateOfIssue','grade','enrollmentNo','certificateNo'))->render();

                $dompdf->loadHtml($html);

            

                // Set paper size and orientation

                $dompdf->setPaper('A4', 'portrait');

            

                // Render PDF (not necessary for download, just for display)

                $dompdf->render();

            

                // Output PDF

                return $dompdf->stream();

            }

            

        public function generatePdf(Request $request)

        {

            $request->validate([

                'name' => 'required|string',

                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

                'course' => 'required|string',

                'startDate' => 'required|date',

                'endDate' => 'required|date',

                'dateOfIssue' => 'required|date',

                'grade' => 'required|string',

                'enrollmentNo' => 'required|string',

                'certificateNo' => 'required|string',

            ]);

        

            // Get the uploaded file

            $image = $request->file('image');

        

            // Get the file extension

            $extension = $image->extension();

        

            // Move the uploaded image to the public/images directory

            $imageName = time().'.'.$extension;

            $image->move(public_path('images'), $imageName);

        

            $name = $request->name;

            $course = $request->course;

            $startDate= $request->startDate;

            $endDate = $request->endDate;

            $dateOfIssue = $request->dateOfIssue;

            $grade = $request->grade;

            $enrollmentNo = $request->enrollmentNo;

            $certificateNo = $request->certificateNo;

        

            // Create PDF

            $options = new Options();

            $options->set('isHtml5ParserEnabled', true);

            $options->set('isRemoteEnabled', true);

            $dompdf = new Dompdf($options);

        

            $html = view('franchise.pdf_template', compact('name', 'imageName', 'course','startDate','endDate','dateOfIssue','grade','enrollmentNo','certificateNo'))->render();

            $dompdf->loadHtml($html);

        

            // Set paper size and orientation

            $dompdf->setPaper('A4', 'portrait');

        

            // Render PDF (not necessary for download, just for display)

            $dompdf->render();

        

            // Output PDF with user-provided name

            $output = $dompdf->output();

        

            // Create a response with the PDF content

            $response = Response::make($output);

        

            // Set the headers for the response to trigger download

            $response->header('Content-Type', 'application/pdf');

            $response->header('Content-Disposition', 'attachment; filename="' . $name . '.pdf"');

        

            // Return the response

            return $response;

            

        }



        public function certificatePdfForm()

        {

            return view('franchise.certificate_pdf_form');

        }



        public function generateCertificatePdf(Request $request)

       {

        $request->validate([

            'name' => 'required|string',

        ]);



        $name = $request->name;



        // Create PDF

        $options = new Options();

        $options->set('isHtml5ParserEnabled', true);

        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

    

        $html = view('name_pdf_template', compact('name'))->render();

        $dompdf->loadHtml($html);





         // Set paper size and orientation

         $dompdf->setPaper('A4', 'landscape');

        

         // Render PDF (not necessary for download, just for display)

         $dompdf->render();

     

         // Output PDF with user-provided name

         $output = $dompdf->output();

     

         // Create a response with the PDF content

         $response = Response::make($output);

     

         // Set the headers for the response to trigger download

         $response->header('Content-Type', 'application/pdf');

         $response->header('Content-Disposition', 'attachment; filename="' . $name . '.pdf"');

     

         // Return the response

         return $response;







    }

    public function apprecialPdfForm()

    {

        return view('franchise.apprecial_form');

    }



    public function generateApprecialPdf(Request $request)

{

    $request->validate([

        'name' => 'required|string',
        'name2' => 'required|string',

        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

    ]);

     // Get the uploaded file

     $image = $request->file('image');

        

     // Get the file extension

     $extension = $image->extension();

 

     // Move the uploaded image to the public/images directory

     $imageName = time().'.'.$extension;

     $image->move(public_path('images'), $imageName);


    $name = $request->name;
   $name2= $request->name2;
    // Create PDF

    $options = new Options();

    $options->set('isHtml5ParserEnabled', true);

    $options->set('isRemoteEnabled', true);

    $dompdf = new Dompdf($options);
    $html = view('franchise.certi_appreciation_template', compact('name','imageName','name2',))->render();

    $dompdf->loadHtml($html);
     // Set paper size and orientation

     $dompdf->setPaper('A4', 'portrait');

    

     // Render PDF (not necessary for download, just for display)

     $dompdf->render();

     // Output PDF with user-provided name

     $output = $dompdf->output();

     // Create a response with the PDF content

     $response = Response::make($output);
     // Set the headers for the response to trigger download

     $response->header('Content-Type', 'application/pdf');

     $response->header('Content-Disposition', 'attachment; filename="' . $name . '.pdf"');
     return $response;

}
public function downloadCertificates()
{
    
    return view('franchise.download_certificates');
    
}



}