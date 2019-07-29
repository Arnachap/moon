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

Route::get('/', 'PagesController@index');
Route::get('/collection', 'PagesController@collection');
Route::get('/create', 'PagesController@create');
Route::get('/about', 'PagesController@about');
Route::get('/login', 'PagesController@login');
Route::get('/contact', 'PagesController@contact');

// Store Routes
Route::prefix('products')->group(function() {
    Route::get('/t-shirts', 'PagesController@tshirts');
    Route::get('/earrings', 'PagesController@earrings');
    Route::get('/caps', 'PagesController@caps');
});

// Cart Routes
Route::get('/cart', 'CartController@index');
Route::post('/addProductToCart', 'CartController@addProductToCart');
Route::post('/addBowtieToCart', 'CartController@addBowtieToCart');
Route::post('/addCollectionItemToCart/{id}', 'CartController@addCollectionItemToCart');
Route::post('/updateProductQuantity', 'CartController@updateProductQuantity');

// Odrers Routes
Route::post('/place', 'ClientOrdersController@place');
Route::get('/payment/{id}', 'ClientOrdersController@payment');
Route::post('/pay', 'ClientOrdersController@pay');

// Auth Routes
Auth::routes();

// Users Routes
Route::get('/home', 'UsersController@index');
Route::get('/order/{id}', 'UsersController@showOrder');

// Admin Routes
Route::prefix('admin')->group(function() {
    // Login
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    // Index
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // Products
    Route::resource('/products', 'ProductsController');
    Route::delete('/deletePhoto/{id}', 'ProductsController@deletePhoto');

    // Collections
    Route::resource('/collections', 'CollectionsController')->except('show');
    Route::post('/collections/sort', 'CollectionsController@sort');

    // Bowties
    Route::resource('/bowties', 'BowtiesController')->except('index');
    Route::get('/bowties/sort/{id}', 'BowtiesController@sortable');
    Route::post('/bowties/sort', 'BowtiesController@sort');

    // Materials
    Route::get('/materials', 'MaterialsController@index');
    Route::put('/materials/wood/{id}', 'MaterialsController@toggleAvailable');
    Route::post('/materials/tissu', 'MaterialsController@addTissu');
    Route::delete('/materials/tissu/{id}', 'MaterialsController@deleteTissu');

    // Orders
    Route::get('/orders', 'AdminOrdersController@index');
    Route::get('/orders/{id}', 'AdminOrdersController@show');
    Route::post('/orders/status', 'AdminOrdersController@editStatus');

    // Promo Codes
    Route::get('/promo', 'PromoCodesController@index');
    Route::get('/promo/create', 'PromoCodesController@create');
    Route::post('/promo/store', 'PromoCodesController@store');
    Route::delete('/promo/{id}/delete', 'PromoCodesController@destroy');
});