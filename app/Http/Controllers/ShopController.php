<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function view()
    {
        $products = [];     //TODO query to database
        return view('shop', compact('products', $products));
    }
}
