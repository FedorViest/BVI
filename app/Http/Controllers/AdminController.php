<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product_statistics;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Photo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

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
        // Validate the request data
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:4096',
            'short_description' => 'required|string|max:4096',
            'category' => 'required|string',
            //'photos' => 'required|array|min:1|max:10',
            //'photos.*' => 'required|image|max:2048',
        ]);

        // Create a new Product
        $product = new Product([
            'name' => $validatedData['product_name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'short_description' => $validatedData['short_description'],
            'category' => $validatedData['category'],
            //'category' => 'trees'
        ]);

        // Save the Product
        $product->save();

        // Add a corresponding Product_statistics row with count=0
        $productStats = new Product_statistics([
            'product_id' => $product->id,
            'count' => 0,
        ]);
        $productStats->save();

        // Upload the photos to the Photos table
        //TODO crop image
        $this->upload_images($request, $product->id);
        return response()->json(['success' => 'Product added successfully.']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product_query = Product::find($id);
        $product = new Product_with_photo($product_query);
        $photos_query = Photo::query()->select('photo_path')->where('product_id', '=', $product->id)->get();
        foreach ($photos_query as $photo_query){
            $product->photos[] = $photo_query->photo_path;
        }
        return view('admin.edit_existing_product', ['product' => $product]);
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
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|max:4096',
            'short_description' => 'required|string|max:4096',
            'category' => 'required|string',
            //'photos' => 'required|array|min:1|max:10',
            //'photos.*' => 'required|image|max:2048',
        ]);

        Product::query()->where('id', '=', $id)->update([
            'name' => $validatedData['product_name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'short_description' => $validatedData['short_description'],
            'category' => $validatedData['category'],
        ]);

        $orig_photos_query = Photo::query()->where('product_id', '=', $id);
        $orig_photos = $orig_photos_query->get();
        foreach ($orig_photos as $photo){
            File::delete(public_path('photos/' . $photo->photo_path));
        }
        $orig_photos_query->delete();


        // Upload the photos to the Photos table
        //TODO crop image
        $this->upload_images($request, $id);
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::query()->where('id', '=', $id);
        if ($product){

            $photos = Photo::query()->where('product_id', '=', $id)->get();
            foreach ($photos as $photo){
                File::delete(public_path('photos/' . $photo->photo_path));
            }

            $product->delete();

            return Redirect::back()->with('success','Product successfully deleted !');
        }
        return Redirect::back()->with('success','Product not found !');
    }

    /**
     * @param Request $request
     * @param string $id
     * @return void
     */
    public function upload_images(Request $request, string $id): void
    {
        if (!empty($request->file('photos'))) {
            foreach ($request->file('photos') as $photo) {
                $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('photos'), $fileName);
                $photo = new Photo([
                    'product_id' => $id,
                    'photo_path' => $fileName,
                ]);
                $photo->save();
            }
        }
    }
}
