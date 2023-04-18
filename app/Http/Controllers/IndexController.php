<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products_best = Product::select('products.*', DB::raw('MIN(photo_path) AS photo_path'))
            ->leftJoin('photos', 'products.id', '=', 'photos.product_id')
            ->join('product_statistics', 'products.id', '=', 'product_statistics.product_id')
            ->groupBy('products.id', 'product_statistics.count')
            ->orderByDesc('product_statistics.count')
            ->get();

        $products_new = Product::select('products.*', DB::raw('MIN(photo_path) AS photo_path'))
            ->leftJoin('photos', 'products.id', '=', 'photos.product_id')
            ->groupBy('products.id')
            ->orderByDesc('created_at')
            ->get();

        return view('index.index', ['products_best' => $products_best, 'products_new' => $products_new]);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
