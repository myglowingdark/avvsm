<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Franchise;
use App\Models\User;
use App\Models\Courses;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Exception;



use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        
        return view('admin');
    }
    public function adminlayout () {
        $franchise=Franchise::count();
        $student=Student::count();
        $data=compact('franchise','student');
        return view("adminlayout")->with($data);
    }
    public function createFranchiseform() {
        $url=url("/admin/create-new-franchise");
        $title="Create Franchise";
        $page="Create New Franchise";
        $data=compact('url','title','page',);
        return view("admin.create-franchise")->with($data);
        }
    public function createFranchise(Request $request)
    {
        $validatedData = $request->validate([
            'owner_name' => 'required',
            'dob' => 'required',
            'gender' => 'required|in:M,F,O',
            'password' => 'required|confirmed|min:8',
            'state' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'adhar_card_no' => 'required',
            'adhar_card_img' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
            'signature' => 'required|mimes:jpeg,png,jpg|max:2048',
            'pan_card_no' => 'required',
            'pan_card' => 'required|mimes:pdf,jpeg,png,jpg|max:2048',
            'passport_photo' => 'required|mimes:jpeg,png,jpg|max:2048', // Make this field optional
            'email' => 'required|unique:users,email|email',
            'center_address' => 'required',
            'center_contact_no' => 'required',
            'tenure' => 'required',
        ]);
        
        try{
        $hashedPassword = Hash::make($validatedData['password']);
        $timestamp = time(); // Get the current timestamp
        // $dob = Carbon::createFromFormat('Y-m-d', $validatedData['dob']);
        // Generate user ID based on state
    
        // dd($request);
        $user = User::create([
            'name' => $validatedData['owner_name'],
            'username' => "na",
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
            'dob' =>$validatedData['dob'],
            'is_admin'=>0,
            'gender'=> $validatedData['gender'],
            'contact_no'=> $validatedData['contact_no'],
        ]);
        $stateCode = strtoupper(substr($request->state, 0, 2));
        $userId =$stateCode . '-' . str_pad($user->id, 2, '0', STR_PAD_LEFT);
        $user->username = $userId;
        $user->save();  
        // Retrieve the user ID
        $usernId = $user->id;
        $frId = $user->username;
        // Store the franchise
        $enquiry = Franchise::create([
            'user_id' => $usernId,
            'franchise_id' => $frId,
            'owner_name' => $validatedData['owner_name'],
            'state' => $validatedData['state'],
            'address' => $validatedData['address'],
            'adhar_card_no' => $validatedData['adhar_card_no'],
            'pan_card_no' => $validatedData['pan_card_no'],
            'center_address' => $validatedData['center_address'],
            'center_contact_no' => $validatedData['center_contact_no'],
            'tenure' => $validatedData['tenure'],
        ]);
     
        // Generate unique filenames based on the current timestamp, franchise ID, and file extension
        $adhar_card_img = $enquiry->id . '_' . $frId . '_' . $timestamp . '.' . $request->adhar_card_img->getClientOriginalExtension();
        $signature = $enquiry->id . '_' . $frId . '_' . $timestamp . '.' . $request->signature->getClientOriginalExtension();
        $pan_card = $enquiry->id . '_' . $frId . '_' . $timestamp . '.' . $request->pan_card->getClientOriginalExtension();
        $photo = $enquiry->id . '_' . $frId . '_' . $timestamp . '.' . $request->passport_photo->getClientOriginalExtension();
                        
        // Define image paths
        $adharImagePath = 'images/franchise/adhar/';
        $panImagePath = 'images/franchise/pan/';
        $photoImagePath = 'images/franchise/photo/';
        $signImagePath = 'images/franchise/signature/';

        // Ensure directories exist
        foreach ([$adharImagePath, $panImagePath, $photoImagePath,$signImagePath] as $path) {
            if (!is_dir(public_path($path))) {
                mkdir(public_path($path), 0777, true);
            }
        }

        // Move and save adhar card image
        $adharImageName = $adhar_card_img;
        $request->adhar_card_img->move(public_path($adharImagePath), $adharImageName);
        $enquiry->adhar_card = $adharImagePath . $adharImageName;

        // Move and save pan card image
        $panImageName = $pan_card;
        $request->pan_card->move(public_path($panImagePath), $panImageName);
        $enquiry->pan_card = $panImagePath . $panImageName;

        // Move and save signature image
        $photoeName = $photo;
        $request->passport_photo->move(public_path($photoImagePath), $photoeName);
        $enquiry->passport_photo = $photoImagePath . $photoeName;

        $signImageName = $signature;
        $request->signature->move(public_path($signImagePath), $signImageName);
        $enquiry->signature = $signImagePath . $signImageName;

        $enquiry ->save();
        }
        catch (QueryException $e) {
            Log::error('An error occurred: ' . $e->getMessage());
          return back()->with('error',  $e->getMessage())->withInput();
        } catch (Exception $e) {
            Log::error('An error occurred: ' . $e->getMessage());
            return back()->with('error', $e->getMessage())->withInput();
        }
       return redirect()->route('manage-franchise')->with('success', 'Enquiry form submitted successfully!');

    }

    public function updateFranchise(Request $request, $id)
    {
        $franchise = Franchise::find($id);
        $user = $franchise->user;
        $franchise->owner_name = $request['owner_name'];
        $franchise->user->dob= $request['dob'];
        $franchise->user->gender = $request['gender'];
        $franchise->state = $request['state'];
        $franchise->address = $request['address'];
        $franchise->user->contact_no = $request['contact_no'];
        $franchise->center_address = $request['center_address'];
        $franchise->center_contact_no = $request['center_contact_no'];
        $franchise->tenure = $request['tenure'];
        // Save the changes
        $franchise->save();
        $user->save();
    
        return redirect()->route('manage-franchise')->with('success', 'Enquiry  updated successfully!');
    }


    public function editFranchise($id)
    {
        $franchise = Franchise::find($id);
        if(is_null($franchise))
        {
            return redirect('manage-franchise');
        }
        else{
            $url=url("/admin/manage-franchise/update-franchise")."/".($id);
            $title="Edit Franchise";
            $page="Edit  Franchise";
            $assets =asset('/assets');
            $data=compact('franchise','url','title','page','assets');
            // dd($data);
            return view("admin/create-franchise")->with($data);

        }
    }
    public function deleteFranchise($id)
    {
        // Find the franchise by its ID
        $franchise = Franchise::findOrFail($id);
        $user = $franchise->user_id;
        $us = User::findOrFail($user);
        $us->delete();
        
        // Redirect back with success message
        return redirect()->route('manage-franchise')->with('success', 'Franchise deleted successfully');
    }

    public function manageFranchise()
    {
        // Fetch all franchises
        $franchises = Franchise::all();
        
        // Pass data to the view
        return view('admin.manage-franchise', ['franchises' => $franchises]);
    }

    

    public function  enrollNewStudent()
    {
        $courseData = Courses::all();
        $franchiseId =Franchise::all();
        $title = 'Enroll-Student';
        return view("admin/enroll-student",compact('franchiseId','courseData'));
    }
    public function viewStudent()
    {$student = Student::all();
        return view('admin.view-student-list', ['students' => $student]);
    }
    
    
    public function generateStudentId()
    {
        $username = auth()->user()->username;
        $year = now()->year;
    
        // Get the last student_id
        $lastStudentId = Student::max('student_id');
    
        // Extract the numeric part, increment it, and pad with zeros
        $numericPart = $lastStudentId ? (int) substr($lastStudentId, -5) + 1 : 1;
        $numericPart = str_pad($numericPart, 5, '0', STR_PAD_LEFT);
    
        // Combine parts to create the new student_id
        return "{$username}Y{$year}A{$numericPart}";
    }
    
    public function createStudent(Request $request, $id=null)
    {
    //  dd($request);
        try{
            $franchiseId = Franchise::pluck('franchise_id')->first();
            session(['franchise_id' => $franchiseId]);
            if ($id) {
                // Edit mode - load existing student data
                $student = Student::findOrFail($id);
                
                
                return view('franchise/create-student/{id?}', compact('student','franchiseId'));
            }

        $validatedData = $request->validate([
            'center' => 'required',
            'year' => 'required',
            'student_name' => 'required',
            'father_name' => 'required',
            'contact_no' => 'required',
            'gender' => 'nullable|in:M,F,O',
            'email' => 'required|email',
            'marital_status' => 'required',
            'course_duration' => 'required',
            'address' => 'required',
            'course' => 'required',
            'birth_date' => 'required|date',
            'state' => 'required',
            'district' => 'required',
           
            'date_of_admission' => 'required|date',
            'upload_signature' => 'required',
            'upload_photo'=>'required',
        ]);
          
        $student  = Student::create([
            'student_id' => $this->generateStudentId(),
            'center' =>$validatedData['center'],
            'year' => $validatedData['year'],
            'student_name' => $validatedData['student_name'],
            'father_name' => $validatedData['father_name'],
            'contact_no' => $validatedData['contact_no'],
            'gender' => $validatedData['gender'],
            'email' => $validatedData['email'],
            'marital_status' => $validatedData['marital_status'],
           'course_duration' => $validatedData['course_duration'],
            'address' => $validatedData['address'],
            'course_name' => $validatedData['course'],
            'date_of_birth' => $validatedData['birth_date'],
            'state' => $validatedData['state'],
            'district' => $validatedData['district'],
            'date_of_admission' => $validatedData['date_of_admission'],
            'student_signature' => "na",
            'profile_photo' => 'na',

        ]);
        if ($request->hasFile('upload_signature')) {
            $signatureFile = $request->file('upload_signature');
            $signatureName = $student->student_id . '_' . time() . '.' . $signatureFile->getClientOriginalExtension();
            $signaturePath = 'studentImages/student/signature/';
            $signatureFile->move(public_path($signaturePath), $signatureName);
            $student->student_signature = $signaturePath . $signatureName;
        }
        
        // Upload profile photo
        if ($request->hasFile('upload_photo')) {
            $photoFile = $request->file('upload_photo');
            $photoName = $student->student_id . '_' . time() . '.' . $photoFile->getClientOriginalExtension();
            $photoPath = 'studentImages/student/profilePhoto/';
            $photoFile->move(public_path($photoPath), $photoName);
            $student->profile_photo = $photoPath . $photoName;
        }
        $student->save();
        
        if (!$student) {
            // Log an error if the student creation fails
            Log::error('Failed to create student');
            return redirect()->route('add-new-student')->with('error', 'Failed to create student');
        }
        // dd($student);
       
        
        return redirect()->route('view-student')->with('success', 'Enquiry form submitted successfully!');
    } catch (\Exception $e) {
        // Log any unexpected exceptions
        // dd($e->getMessage());    
        Log::error('Exception occurred: ' . $e->getMessage());
        return redirect()->route('add-new-student')->with('error', 'An unexpected error occurred. Please try again.');
    }
    }
       
    public function showUpdateSignature()
    {
        // Find the franchise by its ID
        $franchises = Franchise::all();
        $username = auth()->user()->username;
        
        // dd($username);

        // Pass the franchise data to the view
        return view('franchise.update-signature', compact('franchises', 'username'));
    }

    public function updateSignature(Request $request)
    {
        
        try {

            $id = auth()->user()->id;

// Find the franchise record by its ID
                  $franchise = Franchise::find($id);
                         $user = $franchise->username;

    // Validate the request
    $validatedData = $request->validate([
        'signature' => 'required|mimes:jpeg,png,jpg|max:2048',
        'passport_photo' => 'required|mimes:jpeg,png,jpg|max:2048',
    ]);



                // Retrieve the files from the request
    $signatureFile = $request->file('signature');
    $passportPhotoFile = $request->file('passport_photo');

    // Store the files
    $signaturePath = $signatureFile->store('signatures');
    $passportPhotoPath = $passportPhotoFile->store('passport_photos');

    // Update the Franchise model
    $franchise->update([
        'signature' => $signaturePath,
        'passport_photo' => $passportPhotoPath,
    ]);

    // Retrieve the files from the request
    // $signatureFile = $request->file('signature');
    // $passportPhotoFile = $request->file('passport_photo');
            // dd($request);
            // $files = $request->files;
            // Get the authenticated user
            // $user = auth()->user()->username;
            
            // Get the franchise ID of the user
            // $franchiseId = Franchise::where('franchise_id', $user)->value('franchise_id');
            // dd($user);
            // if($franchiseId===$user){
                // Validate the request
               
                // $signatureFile = $request->file('signature');
                
                // $passportPhotoFile = $request->file('passport_photo');
                // dd( $signatureFile, $passportPhotoFile);
                // dd($signatureFile,  $passportPhotoFile );
                // $validatedData = $files->validate([
                //     'signature' => 'mimes:jpeg,png,jpg|max:2048',
                //     'passport_photo' => 'mimes:jpeg,png,jpg|max:2048',
                // ]);
                // dd($validatedData);
               
                 
                // Update the Franchise model
                // Franchise::where('franchise_id', $user)->update([
                //     'signature' => $request->file('signature')->store('signature'),
                //     'passport_photo' => $request->file('passport_photo')->store('passport_photo'),
                // ]);

            // }
    
            // Redirect back with success message
            return redirect()->route('dashboard')->with('success', 'Passport photo and signature updated successfully!');
        } catch (\Exception $e) {
            // Log any unexpected exceptions
            Log::error('Exception occurred: ' . $e->getMessage());
            return redirect()->route('update-signature')->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
    
    

    
}




