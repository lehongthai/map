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

Route::post('/login', 'Api\UserController@login');
Route::post('/update', 'Api\UserController@updateLocal');


Route::post('/online', 'Api\UserController@postOnline');


Route::post('/update_order','Api\OrderController@update_order');


Route::get('/listorder','Api\OrderController@getOrder');
Route::post('/order','Api\OrderController@putOrder');