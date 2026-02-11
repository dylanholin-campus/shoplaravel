<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->words(3, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . fake()->unique()->numberBetween(1000, 9999),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 500), // Prix entre 10 et 500
            'stock' => fake()->numberBetween(0, 50),
            'image' => fake()->imageUrl(640, 480, 'product', true),
            // On ne met pas category_id ici, on le gérera dans le seeder pour éviter les erreurs
        ];
    }
}
