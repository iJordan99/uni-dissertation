<?php

use App\Http\Controllers\WarehouseController;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WarehouseController::class, 'index']);
Route::get('/create', [WarehouseController::class, 'create']);
Route::post('/create', [WarehouseController::class, 'store']);

