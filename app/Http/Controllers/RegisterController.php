<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class RegisterController extends Controller
{    public function register(Request $request){

        // Validate user input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:profiles',
            'password' => 'required|string|min:8',
            'password_retype' => 'required|same:password'
        ]);

        // Create a new Profile model instance
        $profile = new Profile([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Save the profile to the database
        $profile->save();

        if (auth()->check()){
            auth()->logout();
        }

        auth()->login($profile);

        return redirect()->route('index.index')->with('success', 'Registration successful');
    }
}
