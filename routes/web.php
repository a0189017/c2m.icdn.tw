<?php

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
    return view('index');
})->name('home');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/change_password','AccountController@showChangePasswordForm')->name('showChangePassword');
Route::post('/change_password','AccountController@changePassword')->name('changePassword');

Auth::routes();
Route::get('/terms', function(){ return view('terms'); })->name('terms');

Route::get('/products', 'HomeController@products')->name('products');
Route::get('/product/{id}', 'HomeController@product')->name('product');
Route::get('/design/{id}', 'HomeController@design')->name('design');

Route::post('/checkout/{id}', 'HomeController@checkout')->name('checkout');
Route::get('/checkout/{id}', 'HomeController@checkout')->name('checkout');

Route::post('/place_order', 'HomeController@placeOrder')->name('placeOrder');
Route::get('/thankyou', 'HomeController@thankyou')->name('thankyou');

Route::get('/account/', 'AccountController@index')->name('account');
Route::post('/account/', 'AccountController@updateAccount')->name('updateAccount');
Route::get('/setting/', 'AccountController@index')->name('setting');
Route::get('/orders/', 'AccountController@orders')->name('orders');
Route::get('/order/{id}', 'AccountController@order')->name('order');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::get('/orders', 'AdminController@orders')->name('admin.orders');
    Route::get('/order/show/{order_id}', 'AdminController@orderShow')->name('admin.orderShow');
    Route::post('/order/status/{order_id}', 'AdminController@orderUpdateStatus')->name('admin.orderUpdateStatus');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
