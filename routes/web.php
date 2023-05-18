<?php

use App\Http\Controllers\AlertsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

//register
Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post( 'register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

//login
Route::get('/', (fn () => redirect(route('login'))));
Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::get('logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

//warehouse
Route::get('locations', [WarehouseController::class, 'index'])->name('home')->middleware('auth');
Route::get('warehouse/{warehouse:name}',[WarehouseController::class, 'show'])->name('warehouse.show')->middleware('auth');
Route::get('location/create', [WarehouseController::class, 'create'])->name('location.create')->middleware('auth');
Route::post('locations/create', [WarehouseController::class, 'store'])->name('location.store')->middleware('auth');

//storage
Route::get('storage/{storage:identifier}', [StorageController::class, 'show'])->name('storage.show')->middleware('auth');
Route::post('storage/add/{storage:identifier}', [StorageController::class, 'add'])->name('storage.item.add')->middleware('auth');
Route::post('storage/remove/{storage:identifier}', [StorageController::class, 'remove'])->name('storage.item.remove')->middleware('auth');
Route::get('{warehouse:name}/storage/create', [StorageController::class, 'create'])->name('storage.create');
Route::post('{warehouse:name}/storage/create', [StorageController::class, 'store']);
Route::get('settings/warehouse/storage/{storage:identifier}', [StorageController::class, 'settings'])->name('storage.settings')->middleware('auth');
Route::post('settings/warehouse/storage/{storage:identifier}', [StorageController::class, 'update'])->name('storage.update')->middleware('auth');

//items
Route::get('item/{item:sku}', [StorageController::class, 'item'])->name('item.locations')->middleware('auth');
Route::get('items', [ItemsController::class, 'index'])->name('items')->middleware('auth');
Route::get('items/create', [ItemsController::class, 'create'])->name('item.create')->middleware('auth');
Route::post('items/create', [ItemsController::class, 'store'])->name('item.create')->middleware('auth');
Route::get('settings/item/{item:sku}', [ItemsController::class, 'settings'])->name('item.settings')->middleware('auth');
Route::post('settings/item/{item:sku}', [ItemsController::class, 'update'])->name('item.update')->middleware('auth');

//alerts
Route::get('alerts', [AlertsController::class, 'index'])->name('alerts')->middleware('auth');
Route::post('alerts/{alert:id}', [AlertsController::class, 'remove'])->name('alert.remove')->middleware('auth');
