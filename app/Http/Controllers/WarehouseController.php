<?php

namespace App\Http\Controllers;

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
//        return $warehouse->load('storageBins.items')->storageBins;
        return view('warehouse.show', [
            'warehouse' => $warehouse->load('storageBins.items')
        ]);
    }

    public function store()
    {
        Warehouse::create(
            request()->validate([
                'name' => ['required', 'max:255', 'min:3'],
                'location' => ['required','min:6'],
                'country' => ['required','max:255'],
                'postcode' => ['required', 'max:255', 'min:6'],
            ]));

        return redirect('/locations');
    }
    public function create()
    {
        return view('warehouse.create');
    }
}
