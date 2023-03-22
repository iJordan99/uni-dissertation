<?php

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
Route::post('storage/{storage:identifier}', [StorageController::class, 'add'])->name('storage.item.add')->middleware('auth');
Route::get('{warehouse:name}/storage/create', [StorageController::class, 'create'])->name('storage.create');
Route::post('{warehouse:name}/storage/create', [StorageController::class, 'store']);
Route::get('item/{item:name}', [StorageController::class, 'item'])->name('storage.item.info')->middleware('auth');

//items
Route::get('items', [ItemsController::class, 'index'])->name('items')->middleware('auth');
Route::get('items/create', [ItemsController::class, 'create'])->name('item.create')->middleware('auth');
Route::post('items/create', [ItemsController::class, 'store'])->name('item.create')->middleware('auth');
