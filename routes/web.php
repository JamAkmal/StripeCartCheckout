<?php

use App\Http\Controllers\BookController;
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

Route::get('/',[BookController::class,'index']);
Route::get('/book/{id}',[BookController::class,'addToCart'])->name('addbook.to.cart');
Route::get('/shopping-cart',[BookController::class,'BookCart'])->name('shopping.cart');
Route::delete('/delete-cart-product',[BookController::class,'DeleteProduct'])->name('delete.cart.product');

Route::post('/checkout',[BookController::class,'Checkout'])->name('checkout');
Route::get('/checkout-success',[BookController::class,'success'])->name('checkout.success');
Route::get('/checkout-cancel',[BookController::class,'cancel'])->name('checkout.cancel');