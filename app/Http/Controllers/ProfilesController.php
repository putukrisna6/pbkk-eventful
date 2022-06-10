<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;


class ProfilesController extends Controller
{

    public function profile()
    {
        $user = User::find(Auth::id());
        $profile = Profile::where('user_id', $user->id)->first();
       
        return view('profile', compact('user', 'profile'));
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8 '],
            'phone' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        
        $profile = Profile::where('user_id', $user->id)->first();
        $profile->gender = $request->gender;
        $profile->birthday = $request->birthday;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->city = $request->city;
        $profile->image = base64_encode(file_get_contents($request->file('image')->path()));
        $profile->save();
        
        session()->flash('success', 'Profile updated successfully.');
        return view('profile', compact('user', 'profile'));
    }
}