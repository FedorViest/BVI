<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Photo;

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

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products_query = Product::all();
        //$products = Product::query()->select('products.*')->join('photos', 'photos.product_id', '=', 'products.id');
        $products = array();
        foreach ($products_query as $product_query){
            $product = new Product_with_photo($product_query);
            $photos_query = Photo::query()->select('photo_path')->where('product_id', '=', $product->id)->get();
            foreach ($photos_query as $photo_query){
                $product->photos[] = $photo_query->photo_path;
            }
            $products[] = $product;
        }
        return view('admin.index', ['products' => $products]);
    }

    public function add_product(){
        return view('admin/edit_product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.edit_product');
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
