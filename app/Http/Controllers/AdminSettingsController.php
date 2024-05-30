<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class AdminSettingsController extends Controller
{
    public function view()
    {
        return view('admin/settings');
    }

    public function update(Request $request)
    {
        $admin = auth()->user();

        

        if ($request->hasFile('profile_image')) {
            $request->validate([
                'profile_image' => 'image|mimes:jpeg,jpg|max:2048', // max:2048 specifies a maximum file size of 2MB
            ]);
        
            $file = $request->file('profile_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
        
            // Delete previous profile image if it exists
            if ($admin->profile_image) {
                Storage::delete('public/profile_images/' . $admin->profile_image);
            }
        
            $file->storeAs('public/profile_images', $fileName);
        
            // Update user's profile image
            $admin->profile_image = $fileName;
        }
        
        


        
        // update name

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
        ]);
        $admin->firstname = $request->input('firstname');
        $admin->lastname = $request->input('lastname');




        // update mobile no.
        $request->validate([
            'mobile' => 'required|string|max:255',
        ]);
    
        $admin = auth()->user();
        $admin->mobile = $request->input('mobile');




        $admin->save();

        return redirect()->back()->with('success', 'Details updated successfully.');

        }    
}
