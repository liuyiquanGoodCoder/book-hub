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
 
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');
 
    Route::get('user', 'ApiController@getAuthUser');
 
    Route::get('products', 'ProductController@index');
    Route::get('products/{id}', 'ProductController@show');
    Route::post('products', 'ProductController@store');
    Route::put('products/{id}', 'ProductController@update');
    Route::delete('products/{id}', 'ProductController@destroy');
});

Route::middleware('auth.jwt', 'cors:api')->group (function() {
	Route::post('home', 'BooksController@home');
	Route::post('findbook', 'BooksController@findbook');
	Route::post('bookdet', 'BooksController@bookdet');
	Route::post('addbook', 'BooksController@addbook');
	Route::post('userinfo', 'ApiController@userinfo');
	Route::post('updateuserinfo', 'ApiController@updateuserinfo');
	Route::post('addaddress', 'BooksController@address');
	Route::post('showaddress', 'BooksController@showaddress');
	Route::post('addpayment', 'BooksController@addpayment');
	Route::post('showpayment', 'BooksController@showpayment');
});
