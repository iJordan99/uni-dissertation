<?php

namespace Database\Factories;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Warehouse>
 */
class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => fake()->uuid(),
            'name' => fake()->colorName(),
            'street' => fake()->streetName(),
            'city' => fake()->city(),
            'postcode' => fake()->postcode(),
            'country' => fake()->countryCode()
        ];
    }
}
