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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'trang-quan-tri', 'middleware' => 'auth'], function (){
    Route::get('/dashboard', 'Admin\DashboardController@index');
});

Route::group(['prefix' => 'quan-ly-nhan-vien', 'middleware' => 'auth'], function (){
    Route::get('/danh-sach', 'Admin\UserController@getList');
    Route::get('/them-moi', 'Admin\UserController@getCreate');
    Route::post('/them-moi', 'Admin\UserController@postCreate');
    Route::get('/cap-nhat/{id?}', 'Admin\UserController@getUpdate');
    Route::post('/cap-nhat/{id?}', 'Admin\UserController@postUpdate');
    Route::get('/xoa/{id?}', 'Admin\UserController@getDelete');
});

Route::group(['prefix' => 'quan-ly-san-pham', 'middleware' => 'auth'], function (){
    Route::get('/danh-sach', 'Admin\ProductController@getList');
    Route::get('/them-moi', 'Admin\ProductController@getCreate');
    Route::post('/them-moi', 'Admin\ProductController@postCreate');
    Route::get('/cap-nhat/{id?}', 'Admin\ProductController@getUpdate');
    Route::post('/cap-nhat/{id?}', 'Admin\ProductController@postUpdate');
    Route::get('/xoa/{id?}', 'Admin\ProductController@getDelete');
});

Route::group(['prefix' => 'quan-ly-giao-hang', 'middleware' => 'auth'], function (){
    Route::get('/danh-sach', 'Admin\DeliveryController@getList');
    Route::get('/them-moi', 'Admin\DeliveryController@getCreate');
    Route::post('/them-moi', 'Admin\DeliveryController@postCreate');
    Route::get('/cap-nhat/{id?}', 'Admin\DeliveryController@getUpdate');
    Route::post('/cap-nhat/{id?}', 'Admin\DeliveryController@postUpdate');
    Route::get('/xoa/{id?}', 'Admin\DeliveryController@getDelete');
});

Route::group(['prefix' => 'quan-ly-khach-hang', 'middleware' => 'auth'], function (){
    Route::get('/danh-sach', 'Admin\CustomerController@getList');
    Route::get('/them-moi', 'Admin\CustomerController@getCreate');
    Route::post('/them-moi', 'Admin\CustomerController@postCreate');
    Route::get('/cap-nhat/{id?}', 'Admin\CustomerController@getUpdate');
    Route::post('/cap-nhat/{id?}', 'Admin\CustomerController@postUpdate');
    Route::get('/xoa/{id?}', 'Admin\CustomerController@getDelete');
});


Route::get('/vi-tri-nhan-vien', 'Web\MapController@display');
Route::get('/json-nhan-vien', 'Web\MapController@getListUserJson');