<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Picture;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Product::factory()->count(2)->create()->each(function ($product) {
            $size = Size::pluck('id')->shuffle()->slice(0, rand(1, 4))->all();
            $product->sizes()->attach($size);

            $categoryName = Category::where('id', $product->category_id)->first()->name;
            $allImageOf = Storage::disk('public')->allFiles($categoryName);
            $randomFile = $allImageOf[rand(0, count($allImageOf) - 1)];
            //Create Picture
            Picture::create(array(
                'image' => $randomFile,
                'product_id' => $product->id
            ));
        });
    }
}
