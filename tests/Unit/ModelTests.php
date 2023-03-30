<?php

use App\Models\Alert;
use App\Models\Item;
use App\Models\Storage;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ModelTests extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $warehouse1;
    protected $warehouse2;
    protected $item1;
    protected $item2;
    protected $storage1;
    protected $storage2;
    protected $alert1;
    protected $alert2;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        Auth::login($this->user);

        $this->warehouse1 = Warehouse::create([
            'name' => 'Warehouse 1',
            'street' => '123 Test Street',
            'city' => 'Test City',
            'country' => 'Test Country',
            'postcode' => '12345'
        ]);

        $this->warehouse2 = Warehouse::create([
            'name' => 'Warehouse 2',
            'street' => '456 Test Street',
            'city' => 'Test City',
            'country' => 'Test Country',
            'postcode' => '67890'
        ]);

        $this->storage1 = Storage::create([
            'warehouse_id' => $this->warehouse1->id,
            'identifier' => 'Test',
            'capacity' => 5000,
            'replenish' => 20
        ]);

        $this->storage2 = Storage::create([
            'warehouse_id' => $this->warehouse2->id,
            'identifier' => 'Test2',
            'capacity' => 50000,
            'replenish' => 15
        ]);

        $this->item1 = Item::create([
            'name' => 'test',
            'sku' => 'test',
            'weight' => 140,
            'height' => 140,
            'width' => 140,
            'length' => 140,
            'perishable' => 0,
            'shelf' => 0,
            'reorder' => 20000,
            'cost' => 1.40,
            'price' => 6.90
        ]);

        $this->storage1->item()->attach($this->item1->id, ['quantity' => 10]);
        $this->storage2->item()->attach($this->item1->id, ['quantity' => 10]);

    }


    public function test_warehouse_created()
    {
        $warehouse = Warehouse::create([
            'name' => 'Test Warehouse',
            'street' => '123 Test Street',
            'city' => 'Test City',
            'country' => 'Test Country',
            'postcode' => '12345'
        ]);

        $this->assertModelExists($warehouse);
    }

    public function test_has_warehouse_created_alert()
    {
        $this->assertDatabaseHas('alerts', [
            'type' => 'created_warehouse',
            'warehouse_id' => $this->warehouse1->id,
            'user_id' => $this->user->id
        ]);
    }

    public function test_warehouse_has_storage_alert()
    {
        $this->assertDatabaseHas('alerts', [
            'storage_id' => $this->storage1->id,
            'user_id' => $this->user->id
        ]);

        $this->assertDatabaseHas('alerts', [
            'storage_id' => $this->storage2->id,
            'user_id' => $this->user->id
        ]);
    }

    public function test_warehouse_has_storage()
    {
        $this->assertDatabaseHas('storages', [
            'warehouse_id' => $this->warehouse1->id
        ]);

        $this->assertDatabaseHas('storages', [
            'warehouse_id' => $this->warehouse2->id
        ]);
    }

    public function test_storage_has_item()
    {
        $this->assertDatabaseHas('item_storage', [
            'storage_id' => $this->storage1->id,
            'item_id' => $this->item1->id
        ]);

        $this->assertDatabaseHas('item_storage', [
            'storage_id' => $this->storage2->id,
            'item_id' => $this->item1->id
        ]);
    }

    public function test_user_created()
    {
        $user = User::create([
            'name' => 'Jordan',
            'username' => 'Jordan',
            'email' => 'test@example.com',
            'password' => 'Password',
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id
        ]);
    }

    public function test_user_deleted()
    {
        $this->user->delete();
        $this->assertDatabaseCount('users', 0);
    }
}
