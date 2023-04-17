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
        $order_by = $request->order_by;
        $order_type = $request->order_type;
        $search_query = $request->input('search_query');

        $category = $request->category;
        switch($category) {
            case 'flowers':
                $category_clicked = 1;
                break;
            case 'trees':
                $category_clicked = 2;
                break;
            case 'fruits':
                $category_clicked = 3;
                break;
            case 'vegetables':
                $category_clicked = 4;
                break;
            default:
                $category_clicked = 0;
                break;
        }

        if($category === null) {
            $category = ['flowers', 'trees', 'fruits', 'vegetables'];
        }
        else {
            $category = array($category);
        }

        $min_price = $request->min_price;
        // echo "<script>console.log('$min_price')</script>";
        if($min_price == null) {
            $min_price = number_format(Product::whereIn('category', $category)->min('price'), 2, decimal_separator: '.', thousands_separator: '');
        }
        // else {
        //     echo "<script>console.log('tu')</script>";
        // }
        // echo "<script>console.log('$min_price')</script>";
        $max_price = $request->max_price;
        if($max_price == null) {
            $max_price = number_format(Product::whereIn('category', $category)->max('price'), 2, decimal_separator: '.', thousands_separator: '');
        }

        if($order_by === null) {
            $orderby_clicked = 0;

            $order_by = 'products.id';
            $order_type = 'asc';

            // $products = Product::select('products.*', DB::raw('MIN(photo_path) AS photo_path'))
            //     ->leftJoin('photos', 'products.id', '=', 'photos.product_id')
            //     ->orderBy('products.id', 'asc')
            //     ->groupBy('products.id')
            //     ->get();
        } else {
            // $products = Product::select('products.*', DB::raw('MIN(photo_path) AS photo_path'))
            //     ->leftJoin('photos', 'products.id', '=', 'photos.product_id')
            //     ->orderBy($request->order_by,$request->order_type)
            //     ->groupBy('products.id')
            //     ->get();

            if($order_by === 'id') {
                $orderby_clicked = 0;
            } else if($order_by === 'name') {
                $orderby_clicked = 1;
            } else if($order_by === 'price') {
                if($order_type === 'desc') {
                    $orderby_clicked = 2;
                } else if($order_type === 'asc') {
                    $orderby_clicked = 3;
                }
            }
        }
        // echo "<script>console.log('$products')</script>";

        $products = Product::select('products.*', DB::raw('MIN(photo_path) AS photo_path'))
                ->leftJoin('photos', 'products.id', '=', 'photos.product_id')
                ->where('name', 'LIKE', '%' . $search_query . '%')
                ->whereIn('category', $category)
                ->where('price', '>=', $min_price)
                ->where('price', '<=', $max_price)
                ->orderBy($order_by, $order_type)
                ->groupBy('products.id')
                ->get();

        return view('shop/shop', ['products' => $products, 'orderby_clicked' => $orderby_clicked, 'category_clicked' => $category_clicked, 'min_price' => $min_price, 'max_price' => $max_price, 'search_query'=>$search_query]);
    }

    public function viewProduct(Request $request)
    {
        // $temp = $request->product_id;
        // echo "<script>console.log('$temp')</script>";

        // $product_detail = Product::where('id', '>=', $request->product_id)->first();
        $product_detail = Product::find($request->product_id);
        $photos = Photo::where('product_id', '=', $request->product_id)->get();

        // echo "<script>console.log('$photos')</script>";

        $min_price = $request->min_price;
        if($min_price == null) {
            $min_price = number_format(Product::min('price'), 2);
        }
        $max_price = $request->max_price;
        if($max_price == null) {
            $max_price = number_format(Product::max('price'), 2);
        }

        $best_sellers = Product::select('products.*', DB::raw('MIN(photo_path) AS photo_path'))
            ->leftJoin('photos', 'products.id', '=', 'photos.product_id')
            ->where('products.id', '<>', $request->product_id)
            ->orderBy('products.id', 'asc')
            ->groupBy('products.id')
            ->take(6)
            ->get();

        return view('shop/product_detail', ['product_detail' => $product_detail, 'photos' => $photos, 'best_sellers' => $best_sellers, 'min_price' => $min_price, 'max_price' => $max_price]);
    }

}
