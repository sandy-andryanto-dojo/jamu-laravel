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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('brand', '\App\Http\Controllers\BrandController');
	Route::resource('category', '\App\Http\Controllers\CategoryController');
	Route::resource('user', '\App\Http\Controllers\UserController');
	Route::resource('product', '\App\Http\Controllers\ProductController');
});

