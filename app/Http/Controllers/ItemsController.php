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
                'name' => ['required', 'max:255', 'min:3', 'unique:items,name'],
                'sku' => ['required', 'unique:items,sku'],
                'weight' => ['required'],
                'height' => ['required'],
                'width' => ['required'],
                'length' => ['required'],
                'perishable' => ['boolean'],
                'shelf' => ['required_if:perishable,true','numeric'],
                'reorder' => ['required', 'numeric','min:0'],
                'cost' => ['required', 'numeric','min:0'],
                'selling_price' => ['required', 'numeric','min:0'],
            ]));

        return redirect(route('items'))->with('success', 'Item created');
    }

    public function update(Item $item)
    {
        $item->update(
            request()->validate([
                'weight' => ['numeric'],
                'height' => ['numeric'],
                'width' => ['numeric'],
                'length' => ['numeric'],
                'shelf' => ['numeric'],
                'reorder' => ['numeric'],
                'cost' => ['numeric'],
                'selling_price ' => ['numeric'],
            ]));
        return redirect(route('items'))->with('success', 'Item Updated');
    }
}
