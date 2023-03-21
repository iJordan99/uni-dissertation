<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StorageBin;
use App\Models\Warehouse;
use Illuminate\View\View;

class StorageBinController extends Controller
{
    public function show(StorageBin $storageBin)
    {
        return view('storage.show',[
            'storage' => $storageBin->load('items'),
            'warehouse' => Warehouse::find($storageBin->warehouse_id),
            'items' => Item::all()
        ]);
    }

    public function add(StorageBin $storageBin)
    {
        $req = request()->validate([
            'item' => ['required'],
            'quantity' => ['required', 'min:1']
        ]);

        $existingItem = $storageBin->items->where('id', $req['item'])->first();

        if (!$existingItem)
        {
            $storageBin->items()->attach($req['item'],['quantity' => $req['quantity']]);
            return redirect(route('storage.show',[ 'storageBin' => $storageBin]))->with('success', 'Item added');
        }

        $existingQuantity = $existingItem->pivot->quantity;
        $newQuantity = $existingQuantity + $req['quantity'];
        $storageBin->items()->syncWithoutDetaching([$req['item'] => ['quantity' => $newQuantity]]);
        return redirect(route('storage.show',[ 'storageBin' => $storageBin]))->with('success', 'Item updated');
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

        $warehouse->storageBins()->create($attr);

        return redirect(route('warehouse.show', ['warehouse' => $warehouse->name]))->with('success', 'Storage bin created');
    }

}
