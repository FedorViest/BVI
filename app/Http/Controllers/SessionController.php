<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('login.login');
    }

    public function store(Request $request)
    {
        if (auth()->check()){
            auth()->logout();
        }
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }

        return redirect()->route('index.index');
    }

    public function destroy(){
        auth()->logout();
        return redirect()->route('index.index');
    }
}
