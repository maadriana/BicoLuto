<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Show profile page
    public function showProfile()
{
    $user = Auth::user();
    $formattedBirthday = $user->birthday ? Carbon::parse($user->birthday)->format('Y-m-d') : '';

    return view('dashboard.profile', compact('user', 'formattedBirthday'));
}


    // Update profile details
    public function updateDetails(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:15',
            'gender' => 'required|in:male,female,prefer_not_to_say',
            'birthday' => 'nullable|date',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact_number = $request->input('contact_number');
        $user->gender = $request->input('gender');
        $user->birthday = $request->input('birthday');
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    // Update profile picture
    public function updateProfilePicture(Request $request)
    {
        
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $user = Auth::user();

        
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            
            $image->storeAs('profile_pictures', $imageName, 'public');

            
            $user->profile_picture = 'profile_pictures/' . $imageName;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture updated successfully!');
    }
    public function deleteAccount(Request $request)
   {
    
    $user = Auth::user();

    // Delete the user
    $user->delete();

    
    return redirect('/homepage')->with('success', 'Your account has been deleted.');
    }
}


