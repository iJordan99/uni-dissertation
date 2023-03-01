<?php

use App\Http\Controllers\StorageBinController;
use App\Http\Controllers\WarehouseController;
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

Route::get('/locations', [WarehouseController::class, 'index'])->name('home');
Route::get('warehouse/{warehouse:uuid}',[WarehouseController::class, 'show'])->name('warehouse.show');
Route::get('location/create', [WarehouseController::class, 'create'])->name('location.create');
Route::post('/location', [WarehouseController::class, 'store']);


//Storage Bin Routes
Route::get('/warehouse/{warehouse:uuid}/storage_bins/create', [StorageBinController::class, 'create'])->name('storage.create');
Route::post('/warehouse/{warehouse:uuid}/storage_bins', [StorageBinController::class, 'store']);

