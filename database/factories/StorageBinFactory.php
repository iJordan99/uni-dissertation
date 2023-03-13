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
            'identifier' => fake()->word(),
            'warehouse_id' => StorageBin::factory(),
            'capacity' => 5000,
            'replenish' => 20
        ];
    }
}
