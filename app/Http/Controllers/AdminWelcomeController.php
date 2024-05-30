<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminWelcomeController extends Controller
{
    public function welcome()
    {
        return view('admin.welcome');
    }
}
