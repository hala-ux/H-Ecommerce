<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\BaseController;
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
Route::view('/', 'site.pages.homepage');
Route::view('/login', 'site.pages.homepage')->name('login');
Route::view('/register', 'site.pages.homepage')->name('register');
Route::view('/', 'site.pages.homepage');
Auth::routes();
Route::get('/detail', function () {
    return view('product-detail');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
