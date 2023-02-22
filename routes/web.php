<?php

use App\Http\Controllers\AcountController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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

//home

Route::get('/', [HomeController::class, 'index']);
Route::get('shop', [HomeController::class, 'shop'])->name('shop');
//login
Route::get('shop/login',[AcountController::class,'index'])->name('login');
Route::post('shop/handle-login',[AcountController::class,'handleLogin'])->name('handle.login');
Route::get('shop/acountDetail',[AcountController::class,'acountDetail'])->name('acountDetail');
//register
Route::get('shop/register',[AcountController::class,'register'])->name('register');
Route::post('shop/handle-register',[AcountController::class,'handleRegister'])->name('handle.register');
//logout
Route::get('shop/signout', [AcountController::class, 'signout'])->name('signout');

//detail product
Route::get('shop/{id}', [HomeController::class, 'AddToProductdetail'])->name('AddToProductdetail');
Route::get('shop/product/showdetailPoduct', [HomeController::class, 'showdetailPoduct']); 
//cart product
Route::get('shop/cart/{id}', [CartController::class, 'AddtoCart'])->name('Cart');
Route::get('shop/product/cart/showcart',[CartController::class,'ShowCart'])->name('showCart');
Route::get('shop/product/cart/updata',[CartController::class,'changeQuantityCart'])->name('changeQuantily');
Route::get('shop/product/cart/removeCart',[CartController::class,'removeCart'])->name('removeCart');
Route::get('shop/product/cart/removeItemCart',[CartController::class,'removeItemCart'])->name('removeItemCart');



// Route::get('shop/card', [HomeController::class, 'card']);