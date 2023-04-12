<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Photo::truncate();

        // MAKE TWO PHOTOS FOR EACH PRODUCT WHICH IS ALREADY IN THE DATABASE
        $products= Product::orderBy('id', 'asc')->get();
        // echo $products;
        foreach($products as $product) {
            // echo strtolower(str_replace(' ', '_', $product->name));
            $p_name = strtolower(str_replace(' ', '_', $product->name));
            for ($i = 0; $i < 2; $i++) {
                Photo::create( [
                    'product_id'=>$product->id,
                    'photo_path'=>'assets/products/' . $p_name . $i . '.jpg'
                ] );
            }
        }
    }
}
