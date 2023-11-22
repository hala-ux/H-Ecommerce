<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\AccountController;
use App\Http\Controllers\Site\CartController;
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
require 'admin.php';
Route::view('/s', 'site.pages.homepage');
Route::view('/login', 'site.pages.homepage')->name('login');
Route::view('/register', 'site.pages.homepage')->name('register');
Route::view('/', 'site.pages.homepage');
Auth::routes();
Route::get('/detail', function () {
    return view('site.pages.product');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/{slug}', [CategoryController::class,'show'])->name('category.show');
Route::get('/product/{slug}', [ProductController::class,'show'])->name('product.show');
Route::post('/product/add/cart', [ProductController::class,'addToCart'])->name('product.add.cart');


Route::get('/cart', [CartController::class,'getCart'])->name('checkout.cart');
Route::get('/cart/item/{id}/remove', [CartController::class,'removeItem'])->name('checkout.cart.remove');
Route::get('/cart/clear', [CartController::class,'clearCart'])->name('checkout.cart.clear');


Route::get('checkout/payment/complete', [CheckoutController::class,'complete'])->name('checkout.payment.complete');

Route::get('account/orders', [AccountController::class,'getOrders'])->name('account.orders');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', [CheckoutController::class,'getCheckout'])->name('checkout.index');
    Route::post('/checkout/order', [CheckoutController::class,'placeOrder'])->name('checkout.place.order');

    Route::get('checkout/payment/complete', [CheckoutController::class,'complete'])->name('checkout.payment.complete');

    Route::get('account/orders', [AccountController::class,'getOrders'])->name('account.orders');
});