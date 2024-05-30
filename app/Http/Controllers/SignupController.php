<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


class SignupController extends Controller
{
    public function show()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'mobile' => 'required|string|max:10|regex:/^[0-9]+$/',
            'gender' => 'required|in:male,female,other',
        ]);
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->mobile = $request->mobile;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->save();
        
        return redirect()->route('login')->with(['success', 'Signup successful!']);

    }
    
}
