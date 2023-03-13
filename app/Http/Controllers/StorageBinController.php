<?php

namespace App\Http\Controllers;

use App\Models\StorageBin;
use App\Models\Warehouse;
use Clockwork\Storage\Storage;
use Illuminate\Http\Request;

class StorageBinController extends Controller
{
    public function create(Warehouse $warehouse)
    {
        return view('storage.create', [
            'warehouse' => $warehouse
        ]);
    }

    public function store(Warehouse $warehouse)
    {
        $attr = request()->validate([
            'identifier' => ['required','max:10', 'min:3'],
            'capacity' => ['required', 'numeric'],
            'replenish' => ['required', 'decimal:2', 'between:0,100'],
        ]);

        $warehouse->storageBins()->create($attr);

        return redirect(route('warehouse.show', ['warehouse' => $warehouse->name]))->with('success', 'Storage bin created');
    }

}
