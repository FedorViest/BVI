<?php

namespace App\Http\Controllers;

use App\Enums\ProfileRoleEnum;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Profile;
use Illuminate\Http\Request;

class RegisterController extends Controller
{    public function register(Request $request){

        // Validate user input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email_register' => 'required|string|email|max:255|unique:profiles,email',
            'password_register' => 'required|string|min:8',
            'password_retype' => 'required|same:password_register'
        ]);

        $address = new Address();

        $address->save();

        echo $request->input('email_register');

        // Create a new Profile model instance
        $profile = new Profile([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->get('email_register'),
            'password' => bcrypt($request->input('password_register')),
            'address_id' => $address->id,
        ]);

        // Save the profile to the database
        $profile->save();

        if (auth()->check()){

            if (auth()->user()->role == ProfileRoleEnum::Temp){
                $cart = Cart::query()->where('carts.profile_id', '=', auth()->user()->id)->first();

                if ($cart){
                    Cart::query()->where('carts.profile_id', '=', auth()->user()->id)->
                        update(['profile_id'=>$profile->id]);
                }
            }

            auth()->logout();
        }

        auth()->login($profile);

        return redirect()->route('index.index')->with('success', 'Registration successful');
    }
}
