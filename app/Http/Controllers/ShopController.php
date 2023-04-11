<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function view(Request $request)
    {
        if($request->order_by === null) {
            // echo "<script>console.log('tu')</script>";
            // $request->session()->put('something', 0);
            // $temp = $request->session()->get("num_clicked");
            // echo "<script>console.log('$temp')</script>";

            $products= Product::orderBy('id', 'asc')->get();
        } else {
            $products= Product::orderBy($request->order_by,$request->order_type)->get();
        }
        // echo "<script>console.log('$products')</script>";

        return view('shop', ['products' => $products]);
    }
}
