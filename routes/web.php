<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StorageBinController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
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
Route::get('/', (fn () => redirect(route('login'))));

Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post( 'register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->name('login');

Route::get('logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('locations', [WarehouseController::class, 'index'])->name('home')->middleware('auth');
Route::get('warehouse/{warehouse:uuid}',[WarehouseController::class, 'show'])->name('warehouse.show')->middleware('auth');
Route::get('location/create', [WarehouseController::class, 'create'])->name('location.create')->middleware('auth');
Route::post('/locations', [WarehouseController::class, 'store'])->middleware('auth');

//Storage Bin Routes
Route::get('/warehouse/{warehouse:uuid}/storage_bins/create', [StorageBinController::class, 'create'])->name('storage.create');
Route::post('/warehouse/{warehouse:uuid}/storage_bins', [StorageBinController::class, 'store']);

