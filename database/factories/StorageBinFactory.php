<?php

namespace Database\Factories;

use App\Models\StorageBin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StorageBin>
 */
class StorageBinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'warehouse_id' => StorageBin::factory(),
            'capacity' => fake()->numberBetween(1,5000),
            'max_capacity' => 5000
        ];
    }
}
