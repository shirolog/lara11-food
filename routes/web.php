<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//ユーザーページに関する記述

Route::get('/', [UserController::class, 'home'])
->name('user.home');
Route::get('/register', [UserController::class, 'register'])
->name('user.register');
Route::post('/register', [UserController::class, 'store'])
->name('user.store');
Route::get('/login', [UserController::class, 'login'])
->name('user.login');
Route::post('/login', [UserController::class, 'authenticate'])
->name('user.authenticate');



Route::group(['middleware' => 'auth'] ,function(){

    Route::get('/about', [UserController::class, 'about'])
    ->name('user.about');
    Route::get('/menu', [UserController::class, 'menu'])
    ->name('user.menu');
    Route::get('/orders', [UserController::class, 'orders'])
    ->name('user.orders');
    Route::get('/contact', [UserController::class, 'contact'])
    ->name('user.contact');
    Route::get('/search', [UserController::class, 'search'])
    ->name('user.search');
    Route::get('/cart', [UserController::class, 'cart'])
    ->name('user.cart');
    Route::get('/checkout', [UserController::class, 'checkout'])
    ->name('user.checkout');
    Route::get('/profile', [UserController::class, 'profile'])
    ->name('user.profile');
    Route::get('/update_profile', [UserController::class, 'update_profile'])
    ->name('user.update_profile');
    Route::get('/update_address', [UserController::class, 'update_address'])
    ->name('user.update_address');
    Route::get('/logout', [UserController::class, 'logout'])
    ->name('user.logout');
});


//管理者ページに関する記述

Route::get('/admin_login', [AdminController::class, 'admin_login'])
->name('admin.admin_login');
Route::post('/admin_login', [AdminController::class, 'authenticate'])
->name('admin.authenticate');
Route::get('/admin_register', [AdminController::class, 'admin_register'])
->name('admin.admin_register');
Route::post('/admin_register', [AdminController::class, 'store'])
->name('admin.store');

Route::group(['middleware' => 'check-admin:admin'], function(){

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');
    Route::get('/admin_accounts', [AdminController::class, 'admin_accounts'])
    ->name('admin.admin_accounts');
    Route::get('/placed_orders', [AdminController::class, 'placed_orders'])
    ->name('admin.placed_orders');
    Route::get('/messages', [AdminController::class, 'messages'])
    ->name('admin.messages');
    Route::get('/products', [AdminController::class, 'products'])
    ->name('admin.products');
    Route::get('/update_product', [AdminController::class, 'update_product'])
    ->name('admin.update_product');
    Route::get('/update_profile', [AdminController::class, 'update_profile'])
    ->name('admin.update_profile');
    Route::get('/user_accounts', [AdminController::class, 'user_accounts'])
    ->name('admin.user_accounts');
    Route::get('/admin_logout', [AdminController::class, 'logout'])
    ->name('admin.logout');
    
});