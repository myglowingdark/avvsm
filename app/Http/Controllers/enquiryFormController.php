<?php

namespace App\Http\Controllers;

use App\Models\enquiryform;
use App\Models\Franchise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class enquiryFormController extends Controller
{
    public function showEnquiryForm()
    {

        
        return view('franchise.student-enquiry-form');
        }

    public function showEnquiryList()
    {
        // Fetch all enquiry forms from the database
        $enquiryForms = enquiryform::all();
        
        // Pass the data to the view
        return view('student-enquiry-list', ['enquiryForms' => $enquiryForms]);


        //return view('student-enquiry-list');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'selectcenter' => 'required',
            'counselorname' => 'required',
            'candidatename' => 'required',
            'fathername' => 'required',
            'contact' => 'required',
            'whatsappno' => 'required',
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
            'afterdiscountfee' => 'required',
            'state' => 'required',
            'district' => 'required',
            'pincode' => 'required',
            'address' => 'required',
            'remark' => 'required',
            'date_of_enquiry' => 'required|date',
        ]);
        dd($validatedData);

        $franchiseId = Franchise::pluck('franchise_id')->first();
          
        $enquiry  = enquiryform::create([
            'selectcenter' => $franchiseId,
            'counselorname' => $validatedData['counselorname'],
            'candidatename' => $validatedData['candidatename'],
            'fathername' => $validatedData['fathername'],
            'contact' => $validatedData['contact'],
            'whatsappno' => $validatedData['whatsappno'],
            
            'gender' => $validatedData['gender'],
            'email' => $validatedData['email'],
           'marital_status' => $validatedData['marital_status'],
            'birth_date' => $validatedData['birth_date'],
            'qualification' => $validatedData['qualification'],
            'interested_course' => $validatedData['interested_course'],
            'interested_course_duration' => $validatedData['interested_course_duration'],
            'suggested_course' => $validatedData['suggested_course'],
            'suggested_course_duration' => $validatedData['suggested_course_duration'],
            'actualfee' => $validatedData['actualfee'],
            'afterdiscountfee' => $validatedData['afterdiscountfee'],
            'state' => $validatedData['state'],
            'district' => $validatedData['district'],
            'pincode' => $validatedData['pincode'],
            'address' => $validatedData['address'],
            'remark' => $validatedData['remark'],
            'date_of_enquiry' => $validatedData['date_of_enquiry'],

            
        ]);
        // dd($request->all());
        $enquiry ->save();

       // enquiryform::create($validatedData);

       //return   redirect()->back();
       return redirect()->route('student-enquiry-list')->with('success', 'Enquiry form submitted successfully!');

    }

     public function edit($id)
    {
        $enquiryForm = enquiryform::findOrFail($id);
        return view('edit-enquiry-form', compact('enquiryForm'));
    }

    public function update(Request $request, $id)
    {
        $enquiryForm = enquiryform::findOrFail($id);

        $validatedData = $request->validate([
            'selectcenter' => 'required',
            'counselorname' => 'required',
            'candidatename' => 'required',
            'fathername' => 'required',
            'contact' => 'required',
            'whatsappno' => 'required',
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
            'afterdiscountfee' => 'required',
            'state' => 'required',
            'district' => 'required',
            'pincode' => 'required',
            'address' => 'required',
            'remark' => 'required',
            'date_of_enquiry' => 'required|date',
        ]);
          
        $enquiryForm->selectcenter = $validatedData['selectcenter'];
        $enquiryForm->counselorname = $validatedData['counselorname'];
        $enquiryForm->candidatename = $validatedData['candidatename'];
        $enquiryForm->fathername = $validatedData['fathername'];
        $enquiryForm->contact = $validatedData['contact'];
        $enquiryForm->whatsappno = $validatedData['whatsappno'];
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
        $enquiryForm->afterdiscountfee = $validatedData['afterdiscountfee'];
        $enquiryForm->state = $validatedData['state'];
        $enquiryForm->district = $validatedData['district'];
        $enquiryForm->pincode = $validatedData['pincode'];
        $enquiryForm->address = $validatedData['address'];
        $enquiryForm->remark = $validatedData['remark'];
        $enquiryForm->date_of_enquiry = $validatedData['date_of_enquiry'];
    
        // Save the changes
        $enquiryForm->save();
    

        return redirect()->route('student-enquiry-list')->with('success', 'Enquiry  updated successfully!');
    }

    
}
