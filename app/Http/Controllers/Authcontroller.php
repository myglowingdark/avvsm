<?php

namespace App\Http\Controllers;
use App\Models\Franchise;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class Authcontroller extends Controller
{
    public function dashboard()
    {
        if (auth()->check() && auth()->user()->is_admin == 1) {

            
            return redirect('/admin');
        }
        else
        {
            $user=auth()->user()->username;
            // $student = $user->center;
            $student = Student::where('center', $user)->count();
            $ustudent = Student::where('center', $user)
            ->where('register_status', 'U')
            ->get()->count();
            $rstudent =Student::where('center', $user)
            ->where('register_status', 'R')
            ->get()->count();
            $data=compact('student','ustudent','rstudent');
            return view('layout')->with($data);
        }
    
        
    }
    
    public function login()
    {
       
        return view('auth/login');
    }
    public function userlogin()
    {
        
        validator(request()->all(),[
            // 'username'=>['username'],
            'password'=>['required']
        ])->validate();

        $credentials = request()->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            Session::put('username',  request('Username'));
            return redirect('/');
        }
        return redirect()->back()->withErrors(['username'=>'Invalid Credentials']);
    }
    public function logout(Request $request)
    {
        $username = Session::get('username'); // Retrieve username from session
        $user = User::where('username', $username)->first(); // Find the user by username

        if ($user) {
            // Delete the session tokens associated with the user
            $user->tokens()->delete();
        }

        Auth::logout(); // Log out the user

        return redirect('/login');
    }




    // Change password
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

public function updatePassword(Request $request)
{
    

    $validatedData = $request->validate([
        'current_password' => 'required',  #new password
        'password' => 'required|confirmed', #old password
    ]);

    try {
        
         $user = User::find(auth()->user()->id);
       

         if (!Hash::check($validatedData['current_password'], $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect']);
        }
    
        $user->password = Hash::make($validatedData['password']);
        $user->save();
    
        return redirect()->route('dashboard')->with('success', 'Password updated successfully');
    }
    catch (Exception $e) {
        Log::error('An error occurred: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to update password');
    }
}
}

