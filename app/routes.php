<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
        return View::make('index');
});

Route::get('/list', function()
{
        return Session::get('openid');
});

Route::get('/profile', 'UserController@showProfile');

Route::post('/profile', 'UserController@editProfile');

Route::get('/phone', 'UserController@showPhone');

Route::get('/address', 'UserController@showAddAddress');

Route::post('/address', 'UserController@addAddress');

Route::delete('/address/{id}', 'UserController@delAddress');

Route::get('/orders', 'UserController@showOrders');

Route::get('/order/{id}', 'OrderController@showOrder');

Route::get('/product/{id}', 'ProductController@showProduct');

