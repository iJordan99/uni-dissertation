<?php

namespace App\Http\Controllers;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        return view('warehouse.index', [
            'warehouses' => $this->getWarehouses(),
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

        return redirect('/');
    }
    public function create()
    {
        return view('warehouse.create');
    }


    protected function getWarehouses(){
        return Warehouse::latest()->filter()->get();
    }
}
