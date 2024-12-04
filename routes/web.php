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
    
    //add_cart処理に関する記述
    Route::post('/add_cart', [UserController::class, 'add_cart'])
    ->name('user.add_cart');

    

    //quick_viewページに関する記述
    Route::get('/quick_view/{product}', [UserController::class, 'quick_view'])
    ->name('user.quick_view');


    
    //aboutページに関する記述
    Route::get('/about', [UserController::class, 'about'])
    ->name('user.about');

    //menuページに関する記述
    Route::get('/menu', [UserController::class, 'menu'])
    ->name('user.menu');


    //ordersページに関する記述
    Route::get('/orders', [UserController::class, 'orders'])
    ->name('user.orders');



    //contactページに関する記述
    Route::get('/contact', [UserController::class, 'contact'])
    ->name('user.contact');
    Route::post('/contact', [UserController::class, 'contact_store'])
    ->name('user.contact_store');



    //searchページに関する記述
    Route::get('/search', [UserController::class, 'search'])
    ->name('user.search');


    //categoryページに関する記述
    Route::get('/category/{category}', [UserController::class, 'category'])
    ->name('user.category');




    //cartページに関する記述
    Route::get('/cart', [UserController::class, 'cart'])
    ->name('user.cart');



    //checkoutページに関する記述
    Route::get('/checkout', [UserController::class, 'checkout'])
    ->name('user.checkout');



    //profileページに関する記述
    Route::get('/profile/{user}', [UserController::class, 'profile'])
    ->name('user.profile');

    //update_profileページに関する記述
    Route::get('/update_profile/{user}', [UserController::class, 'profile_edit'])
    ->name('user.profile_edit');
    Route::put('/update_profile/{user}', [UserController::class, 'profile_update'])
    ->name('user.profile_update');

    //update_addressページに関する記述
    Route::get('/update_address/{user}', [UserController::class, 'address_edit'])
    ->name('user.address_edit');
    Route::put('/update_address/{user}', [UserController::class, 'address_update'])
    ->name('user.address_update');

    //logoutに関する記述
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

Route::group(['middleware' => 'check-admin'], function(){

    
    //dashboardページに関する記述
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

    //admin_accountsページに関する記述
    Route::get('/admin_accounts', [AdminController::class, 'admin_accounts'])
    ->name('admin.admin_accounts');
    Route::delete('/admin_accounts/{admin}', [AdminController::class, 'admin_accounts_destroy'])
    ->name('admin.admin_accounts_destroy');


    //placed_ordersページに関する記述
    Route::get('/placed_orders', [AdminController::class, 'placed_orders'])
    ->name('admin.placed_orders');



    //messagesページに関する記述
    Route::get('/messages', [AdminController::class, 'messages'])
    ->name('admin.messages');
    Route::delete('/messages/{message}', [AdminController::class, 'messages_destroy'])
    ->name('admin.messages_destroy');




    //productsページに関する記述
    Route::get('/products', [AdminController::class, 'products'])
    ->name('admin.products');
    Route::post('/products', [AdminController::class, 'products_store'])
    ->name('admin.products_store');
    Route::delete('/products/{product}', [AdminController::class, 'products_destroy'])
    ->name('admin.products_destroy');




    //update_productページに関する記述
    Route::get('/update_product/{product}', [AdminController::class, 'product_edit'])
    ->name('admin.product_edit');
    Route::put('/update_product/{product}', [AdminController::class, 'product_update'])
    ->name('admin.product_update');


    //update_profileページに関する記述
    Route::get('/admin_update_profile/{admin}', [AdminController::class, 'profile_edit'])
    ->name('admin.profile_edit');
    Route::put('/admin_update_profile/{admin}', [AdminController::class, 'profile_update'])
    ->name('admin.profile_update');


    //user_accountsページに関する記述
    Route::get('/user_accounts', [AdminController::class, 'user_accounts'])
    ->name('admin.user_accounts');
    Route::delete('/user_accounts/{user}', [AdminController::class, 'user_accounts_destroy'])
    ->name('admin.user_accounts_destroy');



    //logout処理に関する記述    
    Route::get('/admin_logout', [AdminController::class, 'logout'])
    ->name('admin.logout');
    
});