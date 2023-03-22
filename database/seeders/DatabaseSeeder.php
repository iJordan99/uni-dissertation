<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\Permission;
use App\Models\Warehouse;
use App\Models\Storage;
use Database\Factories\item_warehouseFactory;
use Database\Factories\StorageFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::factory(5)->create();
        Item::factory(15)->create();
        Storage::factory(50)->create([
            'warehouse_id' => 1
        ]);
    }
}
