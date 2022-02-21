<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

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

Route::redirect('/', '/products', 301);

Route::get('/products', [Controllers\Products\ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [Controllers\Products\ProductController::class, 'show'])->name('products.show');
Route::get('/orders', [Controllers\Orders\OrderController::class, 'index'])->name('orders.index');
Route::get('/contacts', [Controllers\Contacts\ContactController::class, 'index'])->name('contacts.index');

Route::view('/welcome', 'welcome');

// Route::get('/', 'App\Http\Controllers\Products\ProductController@index');
// Route::namespace('App\Http\Controllers')->group(function() {
//     Route::get('/', 'Products\ProductController@index');
// });

// Route::middleware('user.is_active')->get('/', [Controllers\Products\ProductController::class, 'index']);

// Route::middleware('user.is_active')->namespace('App\Http\Controllers')->group(function() {
//     Route::get('/', 'Products\ProductController@index');
// });