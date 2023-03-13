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

Route::get('Register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post( 'Register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::get('Login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('Login', [LoginController::class, 'store'])->name('login');

Route::get('Logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('Locations', [WarehouseController::class, 'index'])->name('home')->middleware('auth');
Route::get('Warehouse/{warehouse:name}',[WarehouseController::class, 'show'])->name('warehouse.show')->middleware('auth');
Route::get('Location/Create', [WarehouseController::class, 'create'])->name('location.create')->middleware('auth');
Route::post('Locations/Create', [WarehouseController::class, 'store'])->name('location.store')->middleware('auth');

//Storage Bin Routes
Route::get('/Warehouse/{warehouse:name}/StorageBin/Create', [StorageBinController::class, 'create'])->name('storage.create');
Route::post('/Warehouse/{warehouse:name}/StorageBin/Create', [StorageBinController::class, 'store']);

