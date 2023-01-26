<?php

use App\Http\Livewire\Customer\ListCustomer;
use App\Http\Livewire\Dashboard\Dashboard;
use App\Http\Livewire\Kategori\ListKategori;
use App\Http\Livewire\Keranjang\ListKeranjang;
use App\Http\Livewire\Order\Order;
use App\Http\Livewire\Product\AdminListProduct;
use App\Http\Livewire\Product\HomeDetailProduct;
use App\Http\Livewire\Product\HomeProduct;
use App\Http\Livewire\Profile\Profile;
use App\Http\Livewire\Reports\Reports;
use App\Http\Livewire\Transaksi\Transaksi;
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




Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('product-detail/{product}', HomeDetailProduct::class)->name('product-detail');
Route::get('products', HomeProduct::class)->name('products');
Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('profile', Profile::class)->name('profile');
    // User Router
    Route::get('keranjang', ListKeranjang::class)->name('keranjang')->middleware('role:user');
    Route::get('transaksi', Transaksi::class)->name('transaksi')->middleware('role:user');
    // Admin Router
    Route::get('dashboard', Dashboard::class)->name('dashboard')->middleware('role:admin');
    Route::get('reports', Reports::class)->name('reports')->middleware('role:admin');
    Route::get('orders', Order::class)->name('orders')->middleware('role:admin');
    Route::get('listkategori', ListKategori::class)->name('listkategori')->middleware('role:admin');
    Route::get('listproducts', AdminListProduct::class)->name('listproducts')->middleware('role:admin');
    Route::get('listcustomers', ListCustomer::class)->name('listcustomers')->middleware('role:admin');
});
