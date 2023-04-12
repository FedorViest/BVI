<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function viewShop(Request $request)
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

        $photos = [];

        // $products_temp = Product::with('photos')->orderBy('id', 'asc')->get();
        // $products_temp = Product::select('products.*', 'photos.photo_path')
        //     ->leftJoin('photos', 'photos.product_id', '=', 'products.id')
        //     ->orderBy('id', 'asc')
        //     ->get();
        // $products_temp = Product::with('photos')
        //     ->leftJoin('photos', 'products.id', '=', 'photos.product_id')
        //     ->groupBy('products.id')
        //     ->get();

        // echo "<script>console.log('$products_temp')</script>";

        return view('shop/shop', ['products' => $products, 'photos' => $photos]);
    }

    public function viewProduct(Request $request)
    {
        // $temp = $request->product_id;
        // echo "<script>console.log('$temp')</script>";

        // $product_detail = Product::where('id', '>=', $request->product_id)->first();
        $product_detail = Product::find($request->product_id);

        // echo "<script>console.log('$product_detail')</script>";

        return view('shop/product_detail', ['product_detail' => $product_detail]);
    }

}
