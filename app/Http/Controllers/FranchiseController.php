<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Franchise;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EnquiryForm;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FranchiseController extends Controller
{
    public function showEnquiryForm()
    {
        $franchiseId = Franchise::pluck('franchise_id')->first();
        // dd($franchiseId);
        // $franchiseId = $fdata->franchise_id;
        return view('franchise.student-enquiry-form', compact('franchiseId'));

    }

    public function showEnquiryList()
    {
        // Fetch all enquiry forms from the database
        $enquiryForms = EnquiryForm::all();
        // dd($enquiryForms);
        
        // Pass the data to the view
        return view('franchise.student-enquiry-list', compact('enquiryForms'));


        //return view('student-enquiry-list');
    }

    public function viewFranchise()
    {
        
        return view('admin.franchise-list');
    }

    public function viewStudentEnquiry()
    {
        $enquiryForms = enquiryform::all();
        return view('admin.view-student-enquiry-list' , ['enquiryForms' => $enquiryForms]);
    }

    public function showRegStudent()
    {
        $students = Student::where('register_status', 'R')
            ->select(
                'id',
                'center',
                'student_id',
                'email',
                'student_name',
                'date_of_birth',
                // Add other student fields you want to retrieve
                'profile_photo',
                'course_duration',
                'course_name',
                'state',
                'date_of_admission',
                'register_status'
            )
            ->get();

        return view('Franchise/registered-student', compact('students'));
    }

    public function listStudent()
    {
        // $students=Student::with('franchise.user')->get();
        $students = Student::where('register_status', 'R')
            ->select(
                'id',
                'center',
                'student_id',
                'email',
                'student_name',
                'father_name',
                'date_of_birth',
                // Add other student fields you want to retrieve
                'profile_photo',
                'student_signature',
                'course_duration',
                'address',
                'course_name',
                'state',
                'district',
                'date_of_admission',
                'register_status'
            )
            ->get();

        
        return $students;
    }

    public function showUnRegStudent()
    {
        $courses = Courses::all();

        $students = Student::where('register_status', 'U')
            ->select(
                'id',
                'center',
                'student_id',
                'email',
                'student_name',
                'date_of_birth',
                // Add other student fields you want to retrieve
                'profile_photo',
                'course_duration',
                'course_name',
                'state',
                'date_of_admission',
                'register_status'
            )
            ->get();

        return view('franchise/unregistered-student',compact('students','courses'));
    }

    public function  enrollNewStudent()
    {
       
        $courseData = Courses::all();
        $franchiseId = auth()->user()->username;
        $title = 'Enroll-Student';
        return view("franchise/enroll-new-student",compact('franchiseId','courseData'));
    }


    public function generateStudentId()
    {
        $username = auth()->user()->username;
        $year = now()->year;
    dd($username);
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
            'center' => $validatedData['center'],
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
            'student_signature' => $validatedData['upload_signature'],
            'profile_photo' => $validatedData['upload_photo'],

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
            return redirect()->route('create-student')->with('error', 'Failed to create student');
        }
        // dd($student);
        // If you reached here, the student was created successfully

        return redirect()->route('unregistered-students')->with('success', 'Enquiry form submitted successfully!');
    } catch (\Exception $e) {
        // Log any unexpected exceptions
        // dd($e->getMessage());    
        Log::error('Exception occurred: ' . $e->getMessage());
        return redirect()->route('create-student')->with('error', 'An unexpected error occurred. Please try again.');
    }
    }






    // InquiryForm....

    
    public function createEnquiry(Request $request)
{
    try {
        $validatedData = $request->validate([
            'center' => 'required',
            'counselor_name' => 'required',
            'candidate_name' => 'required',
            'father_name' => 'required',
            'contact_no' => 'required',
            'whatsapp_no' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'marital_status' => 'required',
            'birth_date' => 'required|date',
            'qualification' => 'required',
            'interested_course' => 'required',
            'interested_course_duration' => 'required',
            'suggested_course' => 'required',
            'suggested_course_duration' => 'required',
            'course_fee' => 'required',
            'discount_fee' => 'required',
            'state' => 'required',
            'district' => 'required',
            'pincode' => 'required',
            'address' => 'required',
            'remark' => 'required',
            'date_of_enquiry' => 'required|date',
        ]);

        $enquiryForm = EnquiryForm::create([
            'center' => $validatedData['center'],
            'counselor_name' => $validatedData['counselor_name'],
            'candidate_name' => $validatedData['candidate_name'],
            'father_name' => $validatedData['father_name'],
            'contact_no' => $validatedData['contact_no'],
            'whatsapp_no' => $validatedData['whatsapp_no'],
            'gender' => $validatedData['gender'],
            'email' => $validatedData['email'],
            'marital_status' => $validatedData['marital_status'],
            'date_of_birth' => $validatedData['birth_date'],
            'qualification' => $validatedData['qualification'],
            'interested_course' => $validatedData['interested_course'],
            'interested_course_duration' => $validatedData['interested_course_duration'],
            'suggested_course' => $validatedData['suggested_course'],
            'suggested_course_duration' => $validatedData['suggested_course_duration'],
            'course_fee' => $validatedData['course_fee'],
            'discount_fee' => $validatedData['discount_fee'],
            'state' => $validatedData['state'],
            'district' => $validatedData['district'],
            'pincode' => $validatedData['pincode'],
            'address' => $validatedData['address'],
            'remark' => $validatedData['remark'],
            'date_of_enquiry' => $validatedData['date_of_enquiry'],
        ]);

        $enquiryForm->save();

        // dd($enquiryForm);
        return redirect()->route('student-enquiry-list')->with('success', 'Enquiry form submitted successfully!');
    } catch (\Exception $e) {
        // Log any unexpected exceptions
        dd( $e->getMessage());
        Log::error('Exception occurred: ' . $e->getMessage());
        return redirect()->route('franchise.student-enquiry-form')->with('error', 'An unexpected error occurred. Please try again.');
    }
}

     public function edit($id)
    {
        $enquiryForm = EnquiryForm::findOrFail($id);
        return view('franchise.edit-enquiry-form', compact('enquiryForm'));
    }

    public function update(Request $request, $id)
    {
        $enquiryForm = EnquiryForm::findOrFail($id);

        $validatedData = $request->validate([
            'center' => 'required',
            'counselo_rname' => 'required',
            'candidate_name' => 'required',
            'father_name' => 'required',
            'contact_no' => 'required',
            'whatsapp_no' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'marital_status' => 'required',
            'birth_date' => 'required|date',
            'qualification' => 'required',
            'interested_course' => 'required',
            'interested_course_duration' => 'required',
            'suggested_course' => 'required',
            'suggested_course_duration' => 'required',
            'actualfee' => 'required',
            'discount_fee' => 'required',
            'state' => 'required',
            'district' => 'required',
            'pincode' => 'required',
            'address' => 'required',
            'remark' => 'required',
            'enquiry_date' => 'required|date',
        ]);
          
        $enquiryForm->center = $validatedData['center'];
        $enquiryForm->counselo_rname = $validatedData['counselor_name'];
        $enquiryForm->candidate_name = $validatedData['candidate_name'];
        $enquiryForm->father_name = $validatedData['father_name'];
        $enquiryForm->contact_no = $validatedData['contact_no'];
        $enquiryForm->whatsapp_no = $validatedData['whatsapp_no'];
        $enquiryForm->gender = $validatedData['gender'];
        $enquiryForm->email = $validatedData['email'];
        $enquiryForm->marital_status = $validatedData['marital_status'];
        $enquiryForm->birth_date = $validatedData['birth_date'];
        $enquiryForm->qualification = $validatedData['qualification'];
        $enquiryForm->interested_course = $validatedData['interested_course'];
        $enquiryForm->interested_course_duration = $validatedData['interested_course_duration'];
        $enquiryForm->suggested_course = $validatedData['suggested_course'];
        $enquiryForm->suggested_course_duration = $validatedData['suggested_course_duration'];
        $enquiryForm->actualfee = $validatedData['actualfee'];
        $enquiryForm->discount_fee = $validatedData['discount_fee'];
        $enquiryForm->state = $validatedData['state'];
        $enquiryForm->district = $validatedData['district'];
        $enquiryForm->pincode = $validatedData['pincode'];
        $enquiryForm->address = $validatedData['address'];
        $enquiryForm->remark = $validatedData['remark'];
        $enquiryForm->enquiry_date = $validatedData['date_of_enquiry'];
    
        // Save the changes
        $enquiryForm->save();
    

        return redirect()->route('franchise.student-enquiry-list')->with('success', 'Enquiry  updated successfully!');
    }

    public function deleteStudent($id)
    {
        // Find the franchise by its ID
        $franchise = Student::findOrFail($id);
        $franchise->delete();
        
        // Redirect back with success message
        return redirect()->route('student-enquiry-list')->with('success', 'Franchise deleted successfully');
    }
}
