<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product_statistics;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Photo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;

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

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products_query = Product::orderBy('name')->get();
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
        $currentTime = now()->toIso8601String();
        $timezone = config('app.timezone');
        $method = $request->method();
        $path = $request->fullUrl();
        $user_email = auth()->user()->email;
        $user_id = auth()->user()->id;
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');
        $requestHeaders = $request->header();
        $requestBody = $request->all();
        $routeName = $request->route()->getName();
        $controllerAction = $request->route()->getActionName();
        $sessionId = session()->getId();
        $responseStatusCode = http_response_code();
        $startTime = microtime(true);
        $endTime = microtime(true);
        $executionTime = round(($endTime - $startTime) * 1000, 2);
        $environment = app()->environment();
        $logMessage = "[$currentTime $timezone] [$method] Request from $ip Request to $path by [$user_id $user_email] User Agent: $userAgent, Route: $routeName, Controller Action: $controllerAction, Session ID: $sessionId, Status Code: $responseStatusCode, Execution Time: {$executionTime}ms, Environment: $environment, Request Headers: " . json_encode($requestHeaders) . ", Request Body: " . json_encode($requestBody);
        Log::info($logMessage);
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
            'product_size' => 'required|string',
            'photos' => 'required|array|min:2|max:10',
            //'photos.*' => 'required|image|max:2048',
        ]);


        // Create a new Product
        $product = new Product([
            'name' => $validatedData['product_name'],
            'price' => number_format($validatedData['price'], 2, decimal_separator: '.', thousands_separator: ''),
            'description' => $validatedData['description'],
            'short_description' => $validatedData['short_description'],
            'category' => $validatedData['category'],
            'product_size' => $validatedData['product_size'],
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
            'product_size' => 'required|string',
            'photos' => 'required|array|min:1|max:10',
            //'photos.*' => 'required|image|max:2048',
        ]);

        Product::query()->where('id', '=', $id)->update([
            'name' => $validatedData['product_name'],
            'price' => number_format($validatedData['price'], 2, decimal_separator: '.', thousands_separator: ''),
            'description' => $validatedData['description'],
            'short_description' => $validatedData['short_description'],
            'category' => $validatedData['category'],
            'product_size' => $validatedData['product_size']
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
        $photos = Photo::query()->where('product_id', '=', $id)->get();
        $product = Product::query()->where('id', '=', $id)->get();
        $numbers = array();

        foreach ($photos as $photo){
            $numbers[] = explode("_", $photo->photo_path)[1];
        }


        if (!empty($request->file('photos'))) {
            foreach ($request->file('photos') as $photo) {
                $fileName = $product[0]->name . '_' . $product[0]->id . '_' . $this->getMax($numbers) + 1 . '.' . $photo->getClientOriginalExtension();
                $numbers[] = $this->getMax($numbers) + 1;

                $image = Image::make($photo);
                $image->fit(500, 500);

                $image->save(public_path('photos') . '/' . $fileName);

                //$photo->move(public_path('photos'), $fileName);
                $photo = new Photo([
                    'product_id' => $id,
                    'photo_path' => $fileName,
                ]);
                $photo->save();
            }
        }
    }

    public function getMax(array $numbers)
    {

        if (empty($numbers)){
            return 0;
        }
        else{
            return max($numbers);
        }
    }
}
