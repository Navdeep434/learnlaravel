<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminAuthSignupController extends Controller
{
    public function showSignupForm()
    {
        return view('admin.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8',
            'mobile' => 'required|string|max:10|regex:/^[0-9]+$/',
            'gender' => 'required|in:male,female,other',
        ]);

        // Create new admin
        $admin = new Admin();
        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->email = $request->email;
        // $admin->password = bcrypt($request->password);
        $admin->password = Hash::make($request->password);
        $admin->mobile = $request->mobile;
        $admin->dob = $request->dob;
        $admin->gender = $request->gender;
        $admin->save();
        return redirect()->route('admin.login')->with('success', 'Admin created successfully.');
    }
}

