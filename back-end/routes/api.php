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
	//all: userinfo management
	Route::get('user', 'ApiController@getAuthUser');
	Route::get('logout', 'ApiController@logout');
 
	//buyer: carts management
	Route::post('addtocarts', 'CartsController@addtocarts');
	Route::get('showcarts', 'CartsController@showcarts');

	//buyer: address management
	Route::get('showaddresses', 'AddressesController@showaddresses');
	Route::post('addaddresses', 'AddressesController@addaddresses');
	
	//buyer: order management
	Route::post('orderbooks', 'CartsController@orderbooks');
	Route::get('showorders', 'CartsController@showorders');

	//seller: store management
	Route::post('create_storeinfo', 'StoreController@create_storeinfo');
	Route::get('show_storeinfo', 'StoreController@show_storeinfo');
	Route::post('update_storeinfo', 'StoreController@update_storeinfo');

	//finance: project management
	Route::post('create_projects', 'ProjectController@create_projects');
	Route::get('show_projects', 'ProjectController@show_projects');
	Route::post('update_projects', 'ProjectController@update_projects');
	Route::post('delete_projects', 'ProjectController@delete_projects');

	//seller: book management
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
	//buyer-unlogin: search and show
	Route::get('home', 'BooksController@home');
	Route::get('findbook/{bname}', 'BooksController@findbook');
	Route::post('bookdet', 'BooksController@bookdet');
});
