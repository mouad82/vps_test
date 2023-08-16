<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index')->name('products.index');
    Route::get('/create', 'create')->name('products.create');
    Route::post('/store', 'store')->name('products.store');
    Route::get('/add-to-box/{product}', 'addToBox')->name('products.addToBox');
    Route::get('/box', 'box')->name('products.box');
});

Auth::routes();


// PAYMENT ROUTE

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/payment', [App\Http\Controllers\PaymentController::class, 'goToPayment'])->name('payment');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
