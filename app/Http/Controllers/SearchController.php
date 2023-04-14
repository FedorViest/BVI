<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;

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

class SearchController extends Controller
{

    public function search(Request $request){
        $query = $request->input('query');

        $products = Product::query()
            ->join('photos as p', 'products.id', '=', 'p.product_id')
            ->where('products.name', 'LIKE', '%w%')
            ->select('products.*', 'p.*')
            ->paginate(2);

        // Pass the search results to the view
        return view('shop/search', ['products' => $products, 'orderby_clicked' => 0, 'category_clicked' => 0, 'query'=>$query]);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
