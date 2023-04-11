<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Item;
use App\Models\Storage;
use App\Models\Warehouse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class StorageController extends Controller
{
    public function show(Storage $storage)
    {
        if ($storage->item->count() == 1) {
            $items = collect($storage->item);
            $storageHasItem = true;
        } else {
            $items = Item::all();
            $storageHasItem = false;
        }

        return view('storage.show',[
            'storage' => $storage,
            'warehouse' => Warehouse::find($storage->warehouse_id),
            'items' => $items,
            'storageHasItem' => $storageHasItem
        ]);
    }

    public function add(Storage $storage)
    {
        $req = request()->validate([
            'item' => ['required'],
            'quantity' => ['required', 'min:1']
        ]);

        $maxAmount = $storage->capacity - $storage->item->pluck('pivot.quantity')->sum();

        if ($storage->item->isEmpty())
        {
            $this->addItemToStorage($storage, $req,$maxAmount);

            return redirect(route('storage.show',[ 'storage' => $storage]))->with('success', 'Item added');
        }
        else
        {
            $existingItem = $storage->item->where('id', $req['item'])->first();
            if ($existingItem)
            {
                $this->updateExistingItemInStorage($storage, $req,$maxAmount, $existingItem);
                $user = Auth::user();
                $alert = new Alert([
                    'type' => 'increased_storage_item_quantity',
                    'storage_id' => $storage->id,
                    'item_id' => $req['item']
                ]);
                $user->alerts()->save($alert);

                return redirect(route('storage.show',[ 'storage' => $storage]))->with('success', 'Item added');
            }
            return redirect(route('storage.show',[ 'storage' => $storage]))->with('error', 'Unable to store two item types');
        }
    }

    private function addItemToStorage(Storage $storage, array $req, Int $maxAmount)
    {
        if ($req['quantity'] <= $maxAmount) {
            $storage->item()->attach($req['item'], ['quantity' => $req['quantity']]);
            $user = Auth::user();
            $alert = new Alert([
                'type' => 'added_storage_item',
                'storage_id' => $storage->id,
                'item_id' => $req['item']
            ]);
            $user->alerts()->save($alert);

            $this->needsReorder($req['item'], $storage);
            return;
        }

        return redirect(route('storage.show',[ 'storage' => $storage]))->with('error', 'Capacity reached');
    }

    public function needsReorder(Int $id, Storage $storage)
    {
        $item = Item::find($id);
        $total = $item->storage->pluck('pivot.quantity')->sum();

        $user = Auth::user();
        if($total <= $item->reorder)
        {
            $alert = new Alert([
                'type' => 'reorder_item',
                'item_id' => $item->id
            ]);
            $user->alerts()->save($alert);
        }

        $storageReorder = $storage->capacity * $storage->replenish / 100;
        if ($storage->item->pluck('pivot.quantity')->sum() < $storageReorder)
        {
            $alert = new Alert([
                'type' => 'storage_reorder_item',
                'item_id' => $item->id,
                'storage_id' => $storage->id
            ]);
            $user->alerts()->save($alert);
        }
    }

    private function updateExistingItemInStorage(Storage $storage, Array $req, Int $maxAmount, Item $existingItem)
    {
        if ($req['quantity'] <= $maxAmount)
        {
            $existingQuantity = $existingItem->pivot->quantity;
            $newQuantity = $existingQuantity + $req['quantity']; $storage->item()->syncWithoutDetaching([$req['item'] => ['quantity' => $newQuantity]]);
            $this->needsReorder($req['item'],$storage);
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

        $existingItem = $storage->item->where('id', $req['item'])->first();

        if (!$existingItem)
        {
            return redirect(route('storage.show',[ 'storage' => $storage]))->with('Error', 'Item doesnt exist');
        }

        $existingQuantity = $existingItem->pivot->quantity;
        $newQuantity = $existingQuantity - $req['quantity'];

        if ($newQuantity <= 0) {
            $storage->item()->detach($req['item']);
            $this->needsReorder($req['item'],$storage);
            return redirect(route('storage.show',[ 'storage' => $storage]))->with('success', 'Item Removed');
        } else {
            $storage->item()->syncWithoutDetaching([$req['item'] => ['quantity' => $newQuantity]]);
            $user = Auth::user();
            $alert = new Alert([
                'type' => 'reduced_storage_item_quantity',
                'storage_id' => $storage->id,
                'item_id' => $req['item']
            ]);
            $user->alerts()->save($alert);
            $this->needsReorder($req['item'],$storage);
        }
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
        $storages = $item->storage;
        foreach ($storages as $storage)
        {
            $storage->warehouse;
        }

        return view('storage.item', [
            'item' => $item,
            'storages' => $storages,
        ]);
    }

}
