<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Cart_content;
use App\Models\Photo;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Product_with_photo {
    public $id;
    public $name;
    public $description;
    public $short_description;
    public $price;
    public $category;
    public $product_size;
    public $created_at;
    public $modified_at;
    public $photos = array();

    public function __construct($row)
    {
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->short_description = $row['short_description'];
        $this->price = $row['price'];
        $this->category = $row['category'];
        $this->product_size = $row['product_size'];
        $this->created_at = $row['created_at'];
        $this->modified_at = $row['modified_at'];
    }
}

class Cart_products {
    public $id;
    public $profile_id;
    public $delivery;
    public $delivery_price;
    public $payment;
    public $payment_price;

    public $products = array();

    public function __construct($row)
    {
        $this->id = $row['id'];
        $this->profile_id = $row['profile_id'];
        $this->delivery = $row['delivery'];
        $this->delivery_price = $row['delivery_price'];
        $this->payment = $row['payment'];
        $this->payment_price = $row['payment_price'];
    }
}

class Product_quantity extends Product_with_photo {
    public $quantity;

    public function __construct($row)
    {
        parent::__construct($row);
        $this->quantity = $row['quantity'];
    }
}

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!Auth::check()){
            //no account
            return view('cart.empty_cart');
        }
        $cart_query = Cart::query()->where('profile_id', '=', auth()->user()->id)->orderByDesc('updated_at')->first();
        if (!$cart_query){
            //no cart
            return view('cart.empty_cart');
        }
        $cart = new Cart_products(
            $cart_query
        );
        $cart_contents = Cart_content::query()->where('cart_id', '=', $cart->id)
            ->join('products', 'products.id', '=', 'cart_contents.product_id')->orderBy('cart_contents.id')->get();
        if (empty($cart_contents)){
            //no products in cart
            return view('cart.empty_cart');
        }
        foreach ($cart_contents as $cart_content){
            $product = new Product_quantity($cart_content);
            //TODO check product ID
            $photos_query = Photo::query()->select('photo_path')->where('product_id', '=', $product->id)->get();
            foreach ($photos_query as $photo_query){
                $product->photos[] = $photo_query->photo_path;
            }
            $cart->products[] = $product;

        }
        $profile = Profile::query()->where("profiles.id", '=', auth()->user()->id)
            ->join('addresses', 'addresses.id', '=', 'profiles.address_id')->first();

        return view('cart.billing_address', ['cart' => $cart, 'profile' => $profile]);
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
        $cart_check = Cart::query()->where('id', '=', $id)
            ->where('profile_id', '=', auth()->user()->id)->first();
        if (!$cart_check){
            return;
        }

        //validate input
        switch ($request->input('column')){
            case 'profiles.last_name':
            case 'profiles.first_name':
                $request->validate([
                    'value' => 'required|string|max:50',
                ]);
                break;
            case 'profiles.email':
                $request->validate([
                    'value' => 'required|email|max:255',
                ]);
                break;
            case 'profiles.phone_number':
                $request->validate([
                    'value' => 'required|digits:9',
                ]);
                break;
            case 'profiles.phone_prefix':
                $request->validate([
                    'value' => 'required|numeric|digits:3',
                ]);
                break;
            case 'addresses.street':
                $request->validate([
                    'value' => 'required|string|max:30',
                ]);
                break;
            case 'addresses.street_number':
                $request->validate([
                    'value' => 'required|numeric',
                ]);
                break;
            case 'addresses.postcode':
                $request->validate([
                    'value' => 'required|digits:5',
                ]);
                break;
            default:
        }

        if ($request->input('profiles.email')){
            return;
        }

        if (explode(".", $request->input('column'))[0] == 'profiles'){
            Profile::query()->where('id', '=', auth()->user()->id)->update([
                $request->input('column') => $request->input('value'),
            ]);
        }
        else{
            $profile = Profile::query()->where('id', '=', auth()->user()->id)->first();
            Address::query()->where('id', '=', $profile->address_id)->update([
                    $request->input('column') => $request->input('value'),
                ]);
            /*Address::query()->join('profiles', 'addresses.id', '=', 'profiles.address_id')
                ->where('profiles.id', '=', auth()->user()->id)->update([
                    $request->input('column') => $request->input('value'),
                ]);*/
        }
        /*$cart = Cart::query()->where('carts.id', '=', $id)
            ->join('profiles', 'profiles.id', '=', 'carts.profile_id')
            ->join('addresses', 'addresses.id', '=', 'profiles.id');
        $cart->update([
            $request->input('column') => $request->input('value'),
        ]);*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
