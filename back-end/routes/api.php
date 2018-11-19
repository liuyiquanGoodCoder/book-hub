<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'ApiController@login')->middleware('cors:api');
Route::post('register', 'ApiController@register')->middleware('cors:api');

Route::middleware('auth.jwt', 'cors:api')->group (function() {
	Route::get('user', 'ApiController@getAuthUser');
	Route::get('logout', 'ApiController@logout');
 
	Route::post('addtocarts', 'CartsController@addtocarts');
	Route::get('showcarts', 'CartsController@showcarts');

	Route::get('showaddresses', 'AddressesController@showaddresses');
	Route::post('addaddresses', 'AddressesController@addaddresses');
	
	Route::post('orderbooks', 'CartsController@orderbooks');
	Route::get('showorders', 'CartsController@showorders');

	Route::post('create_storeinfo', 'StoreController@create_storeinfo');
	Route::get('show_storeinfo', 'StoreController@show_storeinfo');
	Route::post('update_storeinfo', 'StoreController@update_storeinfo');

	Route::post('create_projects', 'ProjectController@create_projects');
	Route::get('show_projects', 'ProjectController@show_projects');
	Route::post('update_projects', 'ProjectController@update_projects');
	Route::post('delete_projects', 'ProjectController@delete_projects');

	Route::get('books', 'ProductController@index');
    Route::get('books/{bname}', 'ProductController@show');
    Route::post('addbooks', 'ProductController@store');
    Route::post('updatebooks', 'ProductController@update');
    Route::post('deletebooks', 'ProductController@destroy');
	
	Route::post('updateuserinfo', 'ApiController@updateuserinfo');
	
	Route::post('addpayment', 'BooksController@addpayment');
	Route::post('showpayment', 'BooksController@showpayment');
});

Route::middleware('cors:api')->group (function() {
	Route::get('home', 'BooksController@home');
	Route::get('findbook/{bname}', 'BooksController@findbook');
	Route::post('bookdet', 'BooksController@bookdet');
});
