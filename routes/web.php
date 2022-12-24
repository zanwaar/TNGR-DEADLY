<?php

use App\Http\Livewire\Product\AdminListProduct;
use App\Http\Livewire\Product\HomeDetailProduct;
use App\Http\Livewire\Product\HomeProduct;
use App\Http\Livewire\Profile\Profile;
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



Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('product-detail', HomeDetailProduct::class)->name('product-detail');
Route::get('products', HomeProduct::class)->name('products');
Route::get('/home', Profile::class)->name('home')->middleware('role:admin');

Route::get('adminproducts', AdminListProduct::class)->name('adminproducts');