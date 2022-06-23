<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        // Seting up factory with right fields
        return [
            'name' => $this->faker->sentence(rand(1, 3),true),
            'description' => $this->faker->sentence(rand(1, 20), true),
            'price' => (mt_rand(5 * 10, 5000 * 10) / 10),
            'category_id' => Category::all()->random(1)->first()->id,
            'status' => $this->faker->randomElement(['standard', 'solded']),
            'published' => $this->faker->boolean(),
            'reference'=>$this->faker->regexify('[A-Za-z0-9]{16}')
        ];
    }
}
