<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->name(),
            'reference' => fake()->ean13(),
            'weight' => fake()->numberBetween(0,250),
            'height' => fake()->numberBetween(0,250),
            'width' => fake()->numberBetween(0,250),
            'length' => fake()->numberBetween(0,250),
        ];
    }
}
