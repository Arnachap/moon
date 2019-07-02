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
Route::post('/updateProductQuantity', 'CartController@updateProductQuantity');

// Odrers Routes
Route::get('/shipping', 'ClientOrdersController@shipping');
Route::post('/ship', 'ClientOrdersController@ship');
Route::get('/payment', 'ClientOrdersController@payment');

// Auth Routes
Auth::routes();

Route::get('/home', 'HomeController@index');

// Admin Routes
Route::prefix('admin')->group(function() {
    // Login
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    // Index
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // Products
    Route::resource('/products', 'ProductsController');

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
});