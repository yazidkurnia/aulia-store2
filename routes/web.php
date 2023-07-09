<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Productdetailcontroller;
use App\Http\Controllers\Cartcontroller;

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

Route::get('/', [Dashboardcontroller::class, 'index'])->name('index');

Route::middleware(['auth:sanctum', 'verified'])->name('dashboard.')->prefix('dashboard')->group(function() {
    Route::get('/', [Dashboardcontroller::class, 'index'])->name('index');
    Route::get('/product-detail/{id}', [Productdetailcontroller::class, 'detail_product'])->name('product.detail');
    Route::POST('/add-to-cart', [Cartcontroller::class, 'add_to_cart'])->name('add.to.cart');
    Route::GET('/cart-list', [Cartcontroller::class, 'index'])->name('user.cart.list');
    Route::POST('/update-cart-status-order', [Cartcontroller::class, 'update_status_order'])->name('update.order.status');


    Route::middleware(['admin:Administrator'])->name('admin.')->prefix('admin')->group(function() {
        Route::get('/', [Admincontroller::class, 'index'])->name('index');
    });
});

require __DIR__.'/auth.php';
