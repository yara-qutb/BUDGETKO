<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        
        $fullName = Auth::user()->name;
        $userName = explode(' ', $fullName)[0];
        $user = auth()->user();
        return view('user.profile', ['userName' => $userName] , compact('user'));    
        
    }

    public function updateProfile(Request $request)
    {
        // Retrieve the currently logged-in user
        $user = $request->user();

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
        ]);
        
        $user->update($validatedData);
        $locale = App::getLocale();
        if ($locale == 'ar') {
            return redirect()->back()->with('success', 'تم تحديث بياناتك بنجاح.');
        }else{
            return redirect()->back()->with('success', 'Profile updated successfully.');
        }
    }
}
