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
        Photo::truncate();

        // MAKE TWO PHOTOS FOR EACH PRODUCT WHICH IS ALREADY IN THE DATABASE
        // $products= Product::orderBy('id', 'asc')->get();
        // // echo $products;
        // foreach($products as $product) {
        //     // echo strtolower(str_replace(' ', '_', $product->name));
        //     $p_name = strtolower(str_replace(' ', '_', $product->name));
        //     for ($i = 0; $i < 2; $i++) {
        //         Photo::create( [
        //             'product_id'=>$product->id,
        //             'photo_path'=>'assets/products/' . $p_name . $i . '.jpg'
        //         ] );
        //     }
        // }
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

// https://pixabay.com/photos/rose-bicolored-flower-bicolored-rose-2417334/
// https://pixabay.com/photos/rose-flower-dew-dewdrops-339236/
// https://pixabay.com/photos/sunflower-yellow-flower-pollen-1627193/
// https://pixabay.com/photos/sunflowers-field-flowers-plantation-4386505/
// https://pixabay.com/photos/daffodils-flowers-garden-plants-3349706/
// https://pixabay.com/photos/easter-bells-daffodils-flower-3306680/
// https://pixabay.com/photos/gerbera-flower-floral-spring-2396812/
// https://pixabay.com/photos/gerbera-daisy-flower-red-1191225/
// https://pixabay.com/photos/flower-lily-botany-blossom-bloom-3763573/
// https://pixabay.com/photos/lily-flower-orange-lily-stamen-3520837/
// https://pixabay.com/photos/flower-orchid-plant-nature-3097458/
// https://pixabay.com/photos/flower-orchid-botany-phalaenopsis-3992392/
// https://pixabay.com/photos/tulips-flowers-garden-meadow-3251607/
// https://pixabay.com/photos/tulips-flowers-garden-tulips-bloom-3365630/

// https://pixabay.com/photos/blueberries-fruits-berries-food-3548239/
// https://pixabay.com/photos/blueberries-heather-blueberry-plant-1648595/
// https://pixabay.com/photos/raspberries-red-fruit-berry-ripe-3454504/
// https://pixabay.com/photos/raspberries-garden-plant-nature-red-3531148/
// https://pixabay.com/photos/strawberries-strawberry-patch-7323943/
// https://pixabay.com/photos/strawberry-blossoms-strawberry-plant-768337/
// https://pixabay.com/photos/watermelon-plant-agriculture-food-1379990/
// https://pixabay.com/photos/watermelon-fruit-food-fresh-6523167/
// https://pixabay.com/photos/grapes-vines-grapevine-vineyard-2656259/
// https://pixabay.com/photos/grapes-vines-grapevine-vineyard-2715711/
// https://pixabay.com/photos/bush-currant-red-fruit-immature-4339246/
// https://pixabay.com/photos/currant-fruits-white-currants-550600/
// https://pixabay.com/photos/berry-blackberries-fruit-food-3513546/
// https://pixabay.com/photos/common-bramble-blackberry-shrub-1687348/

// https://pixabay.com/photos/tomatoes-vines-water-droplets-wet-1561565/
// https://pixabay.com/photos/tomatoes-ripe-immature-red-879441/
// https://pixabay.com/photos/potato-field-agriculture-food-839465/
// https://pixabay.com/photos/potato-agriculture-food-meal-earth-983788/
// https://pixabay.com/photos/vegetables-garden-pumpkin-green-4398758/
// https://pixabay.com/photos/pumpkin-hokkaido-pumpkin-fall-3806393/
// https://pixabay.com/photos/cucumbers-vegetables-cucumber-food-950695/
// https://pixabay.com/photos/cucumbers-vegetables-food-healthy-4612953/
// https://pixabay.com/photos/ginger-natural-remedies-herb-7888804/
// https://pixabay.com/photos/ginger-fresh-ginger-food-organic-5108742/
// https://pixabay.com/photos/garlic-head-ornamental-plants-4220159/
// https://pixabay.com/photos/garlic-fresh-aromatic-plant-3471701/
// https://pixabay.com/photos/onion-root-vegetable-growth-harvest-3706937/
// https://pixabay.com/photos/onion-fields-field-onion-field-3540502/