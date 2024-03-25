<?php

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

//======================================>seller/dashboard
Route::get('/', App\Http\Livewire\Seller\Dashboard\Index::class)
    ->name('seller.dashboard.index');
//======================================>seller/profile
Route::get('/profile', App\Http\Livewire\Seller\Dashboard\Profile::class)
    ->name('seller.dashboard.profile');

//======================================>seller/find/product
Route::get('/content/find/product', App\Http\Livewire\Seller\Product\Find::class)
    ->name('seller.product.find');
//======================================>seller/product
Route::get('/product', App\Http\Livewire\Seller\Product\Product::class)
    ->name('seller.product.product');

//======================================>orders
Route::get('/orders', App\Http\Livewire\Seller\Orders\Order::class)
    ->name('seller.order.order');

//======================================>seller/create/product
Route::get('/content/create/product', App\Http\Livewire\Seller\Product\Create::class)
    ->name('seller.product.create');
