<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::group(['middleware' => ['auth']], function () { 

Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index')->name('products.index');
    Route::get('/create', 'create')->name('products.create');
    Route::post('/store', 'store')->name('products.store');
    Route::get('/add-to-box/{product}', 'addToBox')->name('products.addToBox');
    Route::get('/box', 'box')->name('products.box');
});

Route::post('/save_order', [App\Http\Controllers\OrderController::class ,'saveorder']);
// PAYMENT ROUTE

Route::post('/goToPayment', [App\Http\Controllers\PaymentController::class, 'goToPayment'])->name('goToPayment');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
Auth::routes();

Route::post('/payzone/webhook', [App\Http\Controllers\PaymentController::class ,'handleWebhook'])->name('payzone.webhook');


Route::get('/',function() {
    return redirect('login');
});



