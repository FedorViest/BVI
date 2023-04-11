<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('login.login');
    }

    public function store(){
        $this->validate(request(), [
            'name_register' => 'required|min:3',
            'surname_register' => 'required|min:3',
            'email_register' => 'required|email',
            'password_register' => 'required|min:8',
            'password_retype' => 'required|same:password_register'
        ]);

        $user = Profile::create(request(['name_register', 'surname_register', 'email_register', 'password_retype']));

        auth()->login($user);

        return redirect()->to('/index');
    }

    public function register(Request $request){
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

        auth()->login($profile);

        return redirect()->route('index.index')->with('success', 'Registration successful');

        // Redirect or return a response
        // (e.g. redirect()->route('home')->with('success', 'Registration successful'))
    }
}
