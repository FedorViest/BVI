<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_content;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


class PaymentController extends Controller
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
        $methods = json_decode(file_get_contents(__DIR__ . "\..\..\..\shipping_payment.json"));
        return view('cart.shipping_payment', ['cart' => $cart, 'methods' => $methods]);
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
        //
        $query = Cart::query()->where('id', '=', $id);
        $methods = json_decode(file_get_contents(__DIR__ . "\..\..\..\shipping_payment.json"));
        if ($request->has("shipping")){
            $query->update([
                'delivery' => $request->get("shipping"),
                'delivery_price' => $methods->shipping->{$request->get("shipping")}->price
            ]);
        }
        else if ($request->has("payment")){
            $query->update([
                'payment' => $request->get("payment"),
                'payment_price' => $methods->payment->{$request->get("payment")}->price
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
