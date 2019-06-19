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
Route::get('/cart', 'PagesController@cart');

// Store Routes
Route::prefix('products')->group(function() {
    Route::get('/t-shirts', 'PagesController@tshirts');
    Route::get('/earrings', 'PagesController@earrings');
    Route::get('/caps', 'PagesController@caps');
});

// Auth Routes
Auth::routes();

Route::get('/home', 'HomeController@index');

// Admin Routes
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('/products', 'ProductsController');
    Route::resource('/collections', 'CollectionsController')->except('show');
});