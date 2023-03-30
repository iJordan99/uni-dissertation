<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertsController extends Controller
{
    public function index()
    {
        return view('alerts.index',[
            'alerts' => Alert::with(['user', 'warehouse', 'storage', 'item'])
                ->orderByDesc('created_at')
                ->paginate(8)
        ]);
    }
    public function remove(Alert $alert)
    {
        $alert->delete();
        return redirect(route('alerts'))->with('success', 'Alert Removed');
    }
}
