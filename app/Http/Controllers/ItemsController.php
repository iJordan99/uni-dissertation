<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Storage;
use App\Models\Warehouse;

class ItemsController extends Controller
{
    public function index()
    {
        return view('item.index',[
            'items' => Item::latest()->filter()->paginate(9)->withQueryString(),
            'storage' => Storage::all()
        ]);
    }
}
