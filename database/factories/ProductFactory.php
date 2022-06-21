<?php

namespace Database\Factories;

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
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->sentence(rand(1, 3), true),
            'image' => $this->faker->imageUrl(),
            'price' => (mt_rand(5 * 10, 5000 * 10) / 10),
            'sizes' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            'status' => $this->faker->randomElement(['standard', 'solded']),
            'gender' => $this->faker->randomElement(['homme', 'femme']),
            'published' => $this->faker->boolean(),
            'reference'=>$this->faker->regexify('[A-Za-z0-9]{16}')
        ];
    }
}
