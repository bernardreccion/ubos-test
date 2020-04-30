<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact/send', 'HomeController@send')->name('send');

Route::prefix('shop')->group(function(){
    Route::get('/', 'HomeController@shop')->name('shop.shop');
    Route::get('/product/{id}','HomeController@product')->name('shop.product');
    Route::get('/wishlist','HomeController@wishlist')->name('shop.wishlist');
    Route::post('addWishlist','HomeController@addWishlist')->name('shop.addWishlist');
    Route::get('/removeWishlist/{id}','HomeController@removeWishlist')->name('shop.removeWishlist');
});

Route::prefix('cart')->group(function(){
    Route::get('/', 'CartController@index')->name('cart.index');
    Route::get('/addItem/{id}', 'CartController@addItem')->name('cart.addItem');
    Route::put('/update/{id}', 'CartController@update')->name('cart.update');
    Route::get('/remove/{id}', 'CartController@remove')->name('cart.remove');
});

Route::prefix('checkout')->group(function(){
    Route::get('/', 'CheckoutController@index')->name('checkout.index');
});


Route::group(['middleware' => 'auth'], function(){

    Route::post('formvalidate','CheckoutController@address');

    Route::prefix('profile')->group(function(){
        Route::get('/', 'ProfileController@index')->name('profile.index');
        Route::get('/orders', 'ProfileController@orders')->name('profile.orders');
        Route::get('/address', 'ProfileController@address')->name('profile.address');
        Route::post('/update', 'ProfileController@update')->name('profile.update');
    });
});




Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function(){

    Route::get('/', 'Admin\DashboardController@index')->name('admin.index');


    Route::prefix('roles')->group(function () {
        Route::get('/', 'Admin\DashboardController@indexRoles')->name('roles.index');
        Route::get('/{id}/edit', 'Admin\DashboardController@edit')->name('roles.edit');
        Route::put('/{id}/edit', 'Admin\DashboardController@update')->name('roles.update');
        Route::delete('/{id}', 'Admin\DashboardController@destroy')->name('roles.destroy');
    });
    

    Route::resource('product', 'ProductController');

    Route::prefix('product')->group(function(){
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::post('/create', 'ProductController@store')->name('product.store');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::get('/{id}/edit', 'ProductController@edit')->name('product.edit');
        Route::put('/{id}/edit', 'ProductController@update')->name('product.update');
        Route::delete('/{id}', 'ProductController@destroy')->name('product.destroy');
    });
    

    Route::resource('category', 'CategoryController');

    Route::prefix('category')->group(function(){
        Route::get('/', 'CategoryController@index')->name('category.index');
        Route::post('/create', 'CategoryController@store')->name('category.store');
        Route::get('/create', 'CategoryController@create')->name('category.create');
        Route::get('/{id}/edit', 'CategoryController@edit')->name('category.edit');
        Route::put('/{id}/edit', 'CategoryController@update')->name('category.update');
        Route::delete('/{id}', 'CategoryController@destroy')->name('category.destroy');
    });
});

