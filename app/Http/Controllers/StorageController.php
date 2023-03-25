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

        $maxAmount = $storage->capacity - $storage->items->pluck('pivot.quantity')->sum();

        $req = request()->validate([
            'item' => ['required'],
            'quantity' => ['required', 'min:1']
        ]);

        try {
            if ($req['quantity'] < $maxAmount)
            {
                $existingItem = $storage->items->where('id', $req['item'])->first();

                if (!$existingItem)
                {
                    $storage->items()->attach($req['item'],['quantity' => $req['quantity']]);
                    return redirect(route('storage.show',[ 'storage' => $storage]))->with('success', 'Item added');
                }

                $existingQuantity = $existingItem->pivot->quantity;
                $newQuantity = $existingQuantity + $req['quantity']; $storage->items()->syncWithoutDetaching([$req['item'] => ['quantity' => $newQuantity]]);
                return redirect(route('storage.show',[ 'storage' => $storage]))->with('success', 'Item updated');

            }
            return redirect(route('storage.show',[ 'storage' => $storage]))->with('error', 'Capacity reached');
        } catch (Exception)
        {
            return redirect(route('storage.show',[ 'storage' => $storage]))->with('error', 'Something went wrong');
        }

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

    public function item(Item $item)
    {
        $warehouses = new Collection();

        $storages = $item->storage;
        foreach ($storages as $storage)
        {
            $storage->warehouse;
        }
//        return $item;

        return view('storage.item', [
            'item' => $item,
            'storages' => $storages,
            'warehouses' => $warehouses
        ]);
    }


}
