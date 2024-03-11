<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use App\Models\Duration;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function index(){
        $courses = Courses::all(); // Assuming Course is your model
        // $duration = Duration::all(); // Assuming Course is your model
        return view("admin.coursesList", compact('courses'));
    }

    public function createCourse(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string',
            'duration_years' => 'nullable|integer',
            'duration_months' => 'nullable|integer',
            'fees' => 'nullable|string',
        ]);
    
        $duration = $request->input('duration_years', 0) . '.' . $request->input('duration_months', 0);
        
        $requestData = $request->all();
        $requestData['duration'] = $duration;
    
        try {
            Courses::create($requestData);
            return redirect()->route('/dashboard')->with('success', 'Course created successfully.');
        } catch (\Exception $e) {
            // $message=$e->getMessage();
            // dd($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to create the course.']);
        }
    }
    
    public function edit($id)
    {
        $course = Courses::find($id);
        if(is_null($course))
        {
            return redirect('course.show');
        }
        else{
            $url=url("/admin/courses/").($id)."/edit";
            $title="Edit Franchise";
            $page="Edit  Franchise";
            $assets =asset('/assets');
            $data=compact('franchise','url','title','page','assets');
            // dd($data);
            return view("admin/create-franchise")->with($data);

        }
    }

    // Method to update the specified course
    public function updateCourse(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required|string',
            'duration_years' => 'nullable|integer',
            'duration_months' => 'nullable|integer',
            'fees' => 'nullable|string',
        ]);
        // Concatenate the years and months with a dot (.)
        $duration = $request->input('duration_years', 0) . '.' . $request->input('duration_months', 0);
            
        // Add the concatenated duration to the request data
        $requestData = $request->all();
        $requestData['duration'] = $duration;

                $course = Courses::findOrFail($id);
                $course->update($requestData);

                return redirect()->route('/dashboard')->with('success','Course updated successfully.');
    }
    public function destroyCourse($id)
    {
        Courses::findOrFail($id)->delete();

        return redirect()->route('/dashboard')->with('success','Course deleted successfully.');
    }
}
