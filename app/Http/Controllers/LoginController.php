<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LoginRequest;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication was successful

            return redirect()->intended('/dashboard');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
        
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
