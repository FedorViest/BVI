<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_content;
use App\Models\Order;
use App\Models\Order_content;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('cart.order_confirm');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $id = $request->input('cart_id');

        $cart_query = Cart::query()
            ->where('carts.id', '=', $id)
            ->where('profile_id', '=', auth()->user()->id)
            ->join('profiles', 'profiles.id', '=', 'carts.profile_id')
            ->join('addresses', 'addresses.id', '=', 'profiles.address_id')
            ->first();

        if (!$cart_query){
            //no cart
            return view('cart.empty_cart');
        }

        $email = $request->input('email');

        $cart_content_query = Cart_content::query()
            ->where('cart_contents.cart_id', '=', $id)
            ->join('products', 'products.id', '=', 'cart_contents.product_id')
            ->get();

        $total_price = 0;

        foreach ($cart_content_query as $cart_content){
            $total_price += $cart_content->quantity * $cart_content->price;
        }
        $total_price += $cart_query->delivery_price + $cart_query->payment_price;

        #validate input
         if (!$this->check_db($cart_query, $cart_content_query, $total_price, $email)){
             return 0;
         }

        $order = new Order([
            'profile_id'=> $cart_query->profile_id,
            'delivery'=>$cart_query->delivery,
            'delivery_price'=>$cart_query->delivery_price,
            'payment'=>$cart_query->payment,
            'payment_price'=>$cart_query->payment_price,
            'total_price'=>$total_price,
            'first_name'=>$cart_query->first_name,
            'last_name'=>$cart_query->last_name,
            'email'=>$email,
            'phone_prefix'=>$cart_query->phone_prefix,
            'phone_number'=>$cart_query->phone_number,
            'street'=>$cart_query->street,
            'street_number'=>$cart_query->street_number,
            'postcode'=>$cart_query->postcode
        ]);

        $order->save();

        foreach ($cart_content_query as $cart_content){
            $order_content = new Order_content([
               'order_id'=>$order->id,
                'product_id'=>$cart_content->product_id,
                'quantity'=>$cart_content->quantity
            ]);

            $order_content->save();
        }

        return 1;

    }

    public function check_db($cart_query, $cart_content_query, $total_price, $email){
        if (!$cart_content_query or !$cart_query){
            return false;
        }
        $request = new Request([
            'profile_id'=> $cart_query->profile_id,
            'delivery'=>$cart_query->delivery,
            'delivery_price'=>$cart_query->delivery_price,
            'payment'=>$cart_query->payment,
            'payment_price'=>$cart_query->payment_price,
            'total_price'=>$total_price,
            'first_name'=>$cart_query->first_name,
            'last_name'=>$cart_query->last_name,
            'email'=>$email,
            'phone_prefix'=>$cart_query->phone_prefix,
            'phone_number'=>$cart_query->phone_number,
            'street'=>$cart_query->street,
            'street_number'=>$cart_query->street_number,
            'postcode'=>$cart_query->postcode
        ]);

        $request->validate([
            'profile_id'=> 'required|numeric|min:1',
            'delivery'=> 'required|string',
            'delivery_price'=> 'required|numeric',
            'payment'=> 'required|string',
            'payment_price'=> 'required|numeric',
            'total_price'=> 'required|numeric',
            'first_name'=> 'required|string|max:50',
            'last_name'=> 'required|string|max:50',
            'email'=> 'required|email|max:255',
            'phone_prefix'=> 'required|numeric|digits:3',
            'phone_number'=> 'required|digits:9',
            'street'=> 'required|string|max:30',
            'street_number'=> 'required|numeric',
            'postcode'=> 'required|digits:5'
        ]);

        Cart::query()->where('profile_id', '=', auth()->user()->id)->delete();

        return true;
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
