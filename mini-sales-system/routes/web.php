<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;
use Symfony\Component\Process\Process;
use App\Models\Product;
use App\Http\Controllers\SellController;
use App\Http\Controllers\CustomerController;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

//product route
Route::get('/index', [ProductController::class , 'index'])->name('index')->middleware('isLoggedIn');
Route::get('/from/product', [ProductController::class , 'create'])->name('createFrom')->middleware('isLoggedIn');
Route::post('/insert/product', [ProductController::class , 'insertproduct'])->name('insertproduct');
Route::get('/delete/product/{id}', [ProductController::class , 'deleteproduct'])->middleware('isLoggedIn');
Route::get('/edit/product/{id}', [ProductController::class , 'editProduct'])->middleware('isLoggedIn');
Route::post('/update/product/{id}', [ProductController::class , 'updateproduct']);
Route::post('/add/quantity/{id}', [ProductController::class , 'addquantity']);
Route::get('/print/list',[ProductController::class,'printlist'])->name('printlist')->middleware('isLoggedIn');

//customer route
Route::get('/from/customer', [CustomerController::class , 'fromcustomer'])->name('fromcustomer')->middleware('isLoggedIn');
Route::post('/insert/customer', [CustomerController::class , 'insertcustomer'])->name('insertcustomer');

//order
Route::get('/order', [SellController::class , 'order'])->name('order')->middleware('isLoggedIn');
Route::post('/add/order',[SellController::class,'addOrder'])->name('addOrder');
Route::get('/cart',[SellController::class,'cart'])->name('cart')->middleware('isLoggedIn');
Route::get('/select/customer/{customer_id}/{customer_name}',[SellController::class,'customerSelect'])->name('customerSelect')->middleware('isLoggedIn');
Route::get('/purchase',[SellController::class,'purchase'])->name('purchase')->middleware('isLoggedIn');

//auth
Route::get('/login', [AuthController::class , 'login'])->name('login')->middleware('AlreadyLoggedIn');
Route::post('/user/login',[AuthController::class, 'signinPost'])->name('signinfrom');
Route::get('/registation', [AuthController::class , 'signup'])->name('signup')->middleware('AlreadyLoggedIn');
Route::post('/user/registation' ,[AuthController::class,'signupPost'])->name('registationfrom');
Route::get('/logout', [AuthController::class , 'logout'])->name('logout');


