<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class StorageBinController extends Controller
{
    public function create(Warehouse $warehouse)
    {
        return view('storage.create', [
            'warehouse' => $warehouse
        ]);
    }
}
