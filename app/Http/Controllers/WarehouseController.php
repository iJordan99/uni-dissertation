<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use App\Models\Warehouse;
use Illuminate\View\View;

class WarehouseController extends Controller
{
    public function index(): View
    {
        return view('warehouse.index', [
            'warehouses' => Warehouse::latest()->filter()->paginate(9)->withQueryString(),
        ]);
    }

    public function show(Warehouse $warehouse)
    {
        return view('warehouse.show', [
            'warehouse' => $warehouse,
            'storages' => Storage::filter($warehouse)->paginate(40)
        ]);
    }

    public function store()
    {
        Warehouse::create(
            request()->validate([
                'name' => ['required', 'max:255', 'min:3', 'unique:warehouses,name'],
                'street' => ['required'],
                'city' => ['required'],
                'postcode' => ['required', 'max:255', 'min:6'],
                'country' => ['required','max:255'],
            ]));

        return redirect(route('home'))->with('success', 'Warehouse created');
    }
    public function create()
    {
        return view('warehouse.create');
    }
}
