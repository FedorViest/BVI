<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function viewShop(Request $request)
    {
        if($request->order_by === null) {
            $orderby_clicked = 0;

            $products = Product::select('products.*', DB::raw('MIN(photo_path) AS photo_path'))
                ->leftJoin('photos', 'products.id', '=', 'photos.product_id')
                ->orderBy('products.id', 'asc')
                ->groupBy('products.id')
                ->get();
        } else {
            $products = Product::select('products.*', DB::raw('MIN(photo_path) AS photo_path'))
                ->leftJoin('photos', 'products.id', '=', 'photos.product_id')
                ->orderBy($request->order_by,$request->order_type)
                ->groupBy('products.id')
                ->get();
            
            if($request->order_by === 'id') {
                $orderby_clicked = 0;
            } else if($request->order_by === 'name') {
                $orderby_clicked = 1;
            } else if($request->order_by === 'price') {
                if($request->order_type === 'desc') {
                    $orderby_clicked = 2;
                } else if($request->order_type === 'asc') {
                    $orderby_clicked = 3;
                }
            } 
        }
        // echo "<script>console.log('$products')</script>";

        return view('shop/shop', ['products' => $products, 'orderby_clicked' => $orderby_clicked]);
    }

    public function viewProduct(Request $request)
    {
        // $temp = $request->product_id;
        // echo "<script>console.log('$temp')</script>";

        // $product_detail = Product::where('id', '>=', $request->product_id)->first();
        $product_detail = Product::find($request->product_id);
        $photos = Photo::where('product_id', '=', $request->product_id)->get();

        // echo "<script>console.log('$photos')</script>";

        $best_sellers = Product::select('products.*', DB::raw('MIN(photo_path) AS photo_path'))
            ->leftJoin('photos', 'products.id', '=', 'photos.product_id')
            ->where('products.id', '<>', $request->product_id)
            ->orderBy('products.id', 'asc')
            ->groupBy('products.id')
            ->take(6)
            ->get();

        return view('shop/product_detail', ['product_detail' => $product_detail, 'photos' => $photos, 'best_sellers' => $best_sellers]);
    }

}
