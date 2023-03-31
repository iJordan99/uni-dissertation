<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Storage;

class ItemsController extends Controller
{
    public function index()
    {
        return view('item.index',[
            'items' => Item::latest()->filter()->paginate(9)->withQueryString(),
            'storage' => Storage::all()
        ]);
    }

    public function settings(Item $item)
    {
        return view('item.settings', [
            'item' => $item
        ]);
    }

    public function create()
    {
        return view('item.create');
    }

    public function store()
    {

        Item::create(
            request()->validate([
                'name' => ['required', 'max:255', 'min:3'],
                'sku' => ['required', 'unique:items,sku'],
                'weight' => ['required'],
                'height' => ['required'],
                'width' => ['required'],
                'length' => ['required'],
                'perishable' => ['boolean'],
                'shelf' => ['required_if:perishable,true','numeric'],
                'reorder' => ['required', 'numeric','min:0'],
                'cost' => ['required', 'numeric','min:0'],
                'price' => ['required', 'numeric','min:0']
            ]));

        return redirect(route('items'))->with('success', 'Item created');
    }

    public function update(Item $item)
    {
        $item->update(
            request()->validate([
                'weight' => ['decimal:2'],
                'height' => ['decimal:2'],
                'width' => ['decimal:2'],
                'length' => ['decimal:2'],
                'shelf' => ['numeric'],
                'reorder' => ['numeric'],
                'cost' => ['decimal:2'],
                'price' => ['decimal:2']
            ]));


        return redirect(route('item.settings', ['item' => $item]))->with('success', 'Item Updated');
    }
}
