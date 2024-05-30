<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Item;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.login');
        }

        $adminData = Admin::findOrFail($admin->id);
        $itemTypes = Item::all();

        return view('admin.dashboard', compact('adminData', 'itemTypes'));
    }
}
