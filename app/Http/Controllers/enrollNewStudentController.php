<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\NewStudent;

use Illuminate\Support\Facades\Session;
use Exception;

class enrollNewStudentController extends Controller
{
    public function showNewStudent()
    {
        if (Session::has('token')) {
            // Token exists, proceed to show the dashboard
            // You can retrieve additional data or perform other operations here
            $username=Session::get('username');
            return view('Franchise.enroll-new-student',compact("username"));
        } 
        else{ return view('login');}
      // else return "hello";
       
    }


 

    public function store(Request $request)
    {
        try {
            $username=Session::get('username');

            $validatedData = $request->validate([    
                'selectyear'=>'integer',
                'studentname' => 'required|string|max:255',
                'fathername' => 'required|string|max:255',
                'gender' => 'nullable|in:Male,Female',
                'email' => 'nullable|email',
                'mstatus' => 'nullable|in:Married,Unmarried',
                'courseduration' => 'nullable|integer',
                'address' => 'nullable|string',
                'state' => 'nullable|string',
                'district' => 'nullable|string',
                'selectcourse'=> 'nullable|string',
                'doa' => 'nullable|date',
                'dob' => 'nullable|date',
                'upload_photo' => 'nullable|image|mimes:jpeg,png|max:800',
                'uploadsignature' => 'nullable|file|max:800',
            ]);

            $validatedData['selectcenter'] = $username;
            // Handle file uploads
            if ($request->hasFile('upload_photo')) {
                $photoPath = $request->file('upload_photo')->store('photos', 'public');
                $validatedData['photo'] = $photoPath;
            }

            if ($request->hasFile('uploadsignature')) {
                $signaturePath = $request->file('uploadsignature')->store('signatures', 'public');
                $validatedData['signature'] = $signaturePath;
            }
             Student::create($validatedData);

            return redirect()->route('registered.students')->with('success', 'Student added successfully.');
        } catch (Exception $e) {
            // Handle the exception\
            dd($e->getMessage());
            return redirect()->route('student.store')->with('error', 'An error occurred while adding a new student. Please try again later.');
        }
    }
}
