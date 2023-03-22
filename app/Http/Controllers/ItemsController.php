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

    public function create()
    {
        return view('item.create');
    }

    public function store()
    {

        Item::create(
            request()->validate([
                'name' => ['required', 'max:255', 'min:3', 'unique:items,name'],
                'reference' => ['required', 'unique:items,reference'],
                'weight' => ['required'],
                'height' => ['required'],
                'width' => ['required'],
                'length' => ['required'],
                'perishable' => ['boolean'],
                'shelf' => ['required_if:perishable,true','numeric'],
            ]));

        return redirect(route('items'))->with('success', 'Item created');
    }
}
