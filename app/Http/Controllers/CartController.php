<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_content;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Product_with_photo {
    public $id;
    public $name;
    public $description;
    public $short_description;
    public $price;
    public $category;
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



class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function create_cart(){
        if (!Auth::check()){
            //no account
            return view('cart.empty_cart');
        }
        $cart_query = Cart::query()->where('profile_id', '=', auth()->user()->id)->first();
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
        return $cart;
    }
    //shipping & payment

    public function shipping_payment(){
        $cart = $this->create_cart();
        return view('cart.shipping_payment', ['cart' => $cart]);
    }

    public function put_shipping_payment(Request $request, string $id){
        $query = Cart::query()->where('id', '=', $id);
        if ($request->has("shipping")){
            $query->update([
                'delivery' => $request->get("shipping"),
                //'delivery_price' => $request->get("price")
            ]);
        }
        else if ($request->has("payment")){
            $query->update([
                'payment' => $request->get("payment"),
                //'payment_price' => $request->get("price")
            ]);
        }
    }

    public function index()
    {
        $cart = $this->create_cart();
        return view('cart.shopping_cart', ['cart' => $cart]);
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
        //check if product ID and quantity is given
        $validatedData = $request->validate([
            'product_id' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
        ]);
        $product_id = $validatedData['product_id'];
        $quantity = $validatedData['quantity'];
        $product = Product::query()->where('id', '=', $product_id)->get();
        if (!$product){
            return back()->withErrors([
                'message' => 'The product ID is not found'
            ]);
        }
        //check if user is logged and has cart
        if (!auth()->check()){
            //create temp profile
            $profile = new Profile();

            $profile->save();
            auth()->login($profile);
        }

        //check for cart
        $profile_id =  auth()->user()->id;
        $cart_all = Cart::query()->where('profile_id', '=', $profile_id)->first();
        if (!$cart_all){
            //if no cart
            $cart = new Cart([
                'profile_id' => $profile_id
            ]);
            $cart->save();
        }

        //get cart
        $cart= Cart::query()->where('profile_id', '=', $profile_id)
            ->orderByDesc('updated_at')->first();

        //check if cart already has that item
        $cart_content_query = Cart_content::query()->where('cart_id', '=', $cart->id)
            ->where('product_id', '=', $product_id);
        $cart_content = $cart_content_query->first();
        if ($cart_content){
            //update cart quantity
            $cart_content_query->update([
                'quantity' => $cart_content->quantity + $quantity
            ]);
        }
        else{
            //add new product to cart
            $new_content = new Cart_content([
                'cart_id' => $cart->id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
            $new_content->save();
        }
        return back();
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
     * Update the cart product quantity
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
        ]);
        $product_id = $validatedData['product_id'];
        $quantity = $validatedData['quantity'];
        $cart_content = Cart_content::query()->where('cart_id', '=', $id)
            ->where('product_id', '=', $product_id);
        $cart_content->update([
            'quantity' => $quantity
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|numeric|min:1',
        ]);
        $product_id = $validatedData['product_id'];
        $cart_content = Cart_content::query()->where('cart_id', '=', $id)
            ->where('product_id', '=', $product_id);
        $cart_content->delete();
        return back();
    }
}
