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



// Zdroje stiahnutych obrazkov:
// https://pixabay.com/photos/a-tree-nature-heart-cherry-flowers-5255288/
// https://pixabay.com/photos/linden-tree-building-fruit-stands-210389/
// https://pixabay.com/photos/apple-tree-apples-leaves-fall-3735679/
// https://pixabay.com/photos/nature-tree-no-one-outside-needle-3233209/
// https://www.pexels.com/photo/in-distant-photo-of-tree-on-landscape-field-3283498/
// https://pixabay.com/photos/tree-beech-fall-deciduous-tree-2812466/
// https://pixabay.com/photos/winter-flowers-plum-blossom-tree-1157079/
// https://pixabay.com/photos/apples-fruits-apple-tree-harvest-3535566/
// https://pixabay.com/photos/autumn-leaves-leaves-fall-2822593/
// https://pixabay.com/photos/cherry-fruits-food-fresh-healthy-1437707/
// https://pixabay.com/photos/fall-leaves-autumn-colors-4506947/
// https://pixabay.com/photos/park-acorns-oak-leaves-plants-3682796/
// https://pixabay.com/photos/fir-trees-needles-cones-pine-cones-2288229/
// https://pixabay.com/photos/plums-fruits-food-plum-tree-3563535/