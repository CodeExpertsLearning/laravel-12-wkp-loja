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
    public function definition(): array
    {
        $name = fake()->words(2, true);
        return [
            'name' => $name,
            'description' => fake()->sentence,
            'body' => fake()->paragraphs(3, true),
            'price' => fake()->randomFloat(2, 10) * 100,
            'status' => rand(0, 1),
            'in_stock' => rand(10, 500),
            'slug' => str($name)->slug(),
        ];
    }
}
