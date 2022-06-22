<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['XS', 'S', 'M', 'L', 'XL'];

        foreach ($sizes as $size) {
            Size::create([
                'name' => $size
            ]);
        }

    }
}
