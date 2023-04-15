<?php

namespace App\Http\Controllers;

use App\Enums\ProfileRoleEnum;
use App\Models\Cart;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('login.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $cart = null;

        if (auth()->check()){
            //TODO check if cart exists, if yes, then store it
            if (auth()->user()->role == ProfileRoleEnum::Temp){
                $cart = Cart::query()->where('carts.profile_id', '=', auth()->user()->id);
            }
            auth()->logout();
        }
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }

        if ($cart and $cart->first()){
            $cart->update(['profile_id'=>auth()->user()->id]);
        }

        return redirect()->route('index.index');
    }

    public function destroy(){
        auth()->logout();
        return redirect()->route('index.index');
    }
}
