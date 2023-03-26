<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Storage;
use App\Models\Warehouse;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class StorageController extends Controller
{
    public function show(Storage $storage)
    {
        return view('storage.show',[
            'storage' => $storage->load('items'),
            'warehouse' => Warehouse::find($storage->warehouse_id),
            'items' => Item::all()
        ]);
    }

    public function add(Storage $storage)
    {
        $req = request()->validate([
            'item' => ['required'],
            'quantity' => ['required', 'min:1']
        ]);

        $maxAmount = $storage->capacity - $storage->items->pluck('pivot.quantity')->sum();

        if (!$storage->items->count() > 0)
        {
            $this->addItemToStorage($storage, $req,$maxAmount);
            return redirect(route('storage.show',[ 'storage' => $storage]))->with('success', 'Item added');
        }
        else
        {
            $existingItem = $storage->items->where('id', $req['item'])->first();
            if ($existingItem)
            {
                $this->addExistingItemToStorage($storage, $req,$maxAmount, $existingItem);
                return redirect(route('storage.show',[ 'storage' => $storage]))->with('success', 'Item added');
            }
            return redirect(route('storage.show',[ 'storage' => $storage]))->with('error', 'Unable to store two item types');
        }
    }

    private function addItemToStorage(Storage $storage, array $req, Int $maxAmount)
    {
        if ($req['quantity'] < $maxAmount) {
            $storage->items()->attach($req['item'], ['quantity' => $req['quantity']]);
            return;
        }
        return redirect(route('storage.show',[ 'storage' => $storage]))->with('error', 'Capacity reached');
    }

    private function addExistingItemToStorage(Storage $storage, Array $req, Int $maxAmount, Item $existingItem)
    {
        if ($req['quantity'] < $maxAmount)
        {
            $existingQuantity = $existingItem->pivot->quantity;
            $newQuantity = $existingQuantity + $req['quantity']; $storage->items()->syncWithoutDetaching([$req['item'] => ['quantity' => $newQuantity]]);
            return;
        }
        return redirect(route('storage.show',[ 'storage' => $storage]))->with('error', 'Capacity reached');
    }

    public function remove(Storage $storage)
    {
        $req = request()->validate([
            'item' => ['required'],
            'quantity' => ['required', 'min:1']
        ]);

        $existingItem = $storage->items->where('id', $req['item'])->first();

        if (!$existingItem)
        {
            return redirect(route('storage.show',[ 'storage' => $storage]))->with('Error', 'Item doesnt exist');
        }

        $existingQuantity = $existingItem->pivot->quantity;
        $newQuantity = $existingQuantity - $req['quantity']; $storage->items()->syncWithoutDetaching([$req['item'] => ['quantity' => $newQuantity]]);
        return redirect(route('storage.show',[ 'storage' => $storage]))->with('success', 'Item updated');
    }


    public function create(Warehouse $warehouse) : View
    {
        return view('storage.create', [
            'warehouse' => $warehouse
        ]);
    }

    public function store(Warehouse $warehouse)
    {
        $attr = request()->validate([
            'identifier' => ['required','max:10', 'min:2'],
            'capacity' => ['required', 'numeric'],
            'replenish' => ['required', 'decimal:2', 'between:0,100'],
        ]);

        $warehouse->storage()->create($attr);

        return redirect(route('warehouse.show', ['warehouse' => $warehouse->name]))->with('success', 'Storage bin created');
    }

    public function settings(Storage $storage)
    {
        return view('storage.settings', [
            'storage' => $storage
        ]);
    }
    public function update(Storage $storage)
    {
        $storage->update(
            request()->validate([
                'capacity' => ['numeric', 'min:1'],
                'replenish' => ['decimal:2', 'between:0,100']
            ]));

        return redirect(route('storage.settings', ['storage' => $storage]))->with('success', 'Storage Updated');
    }

    public function item(Item $item)
    {
        $warehouses = new Collection();

        $storages = $item->storage;
        foreach ($storages as $storage)
        {
            $storage->warehouse;
        }

        return view('storage.item', [
            'item' => $item,
            'storages' => $storages,
            'warehouses' => $warehouses
        ]);
    }
}
