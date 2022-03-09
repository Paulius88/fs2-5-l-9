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

Route::prefix('products')->group(function() {
	Route::get('/', [Controllers\Products\ProductController::class, 'index'])->name('products.index');
	Route::get('/create', [Controllers\Products\ProductController::class, 'create'])->name('products.create');
	Route::post('/store', [Controllers\Products\ProductController::class, 'store'])->name('products.store');
	Route::get('/edit/{product}', [Controllers\Products\ProductController::class, 'edit'])->name('products.edit');
	Route::patch('/update/{product}', [Controllers\Products\ProductController::class, 'update'])->name('products.update');
	Route::get('/{product}', [Controllers\Products\ProductController::class, 'show'])->name('products.show');
});

Route::name('orders.')->prefix('orders')->group(function() {
	Route::get('/', [Controllers\Orders\OrderController::class, 'index'])->name('index');
	Route::post('/save', [Controllers\Orders\OrderController::class, 'save'])->name('save');
});

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