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

Route::group(['prefix' => 'trang-quan-tri', 'middleware' => 'auth1'], function (){
    Route::get('/dashboard', 'Admin\DashboardController@index');

    Route::get('/doi-mat-khau', 'Admin\UserController@getChangePassword');
    Route::post('/doi-mat-khau', 'Admin\UserController@postChangePassword');

    Route::get('/doi-anh', 'Admin\UserController@getChangeImage');
    Route::post('/doi-anh', 'Admin\UserController@postChangeImage');
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

Route::group(['prefix' => 'quan-ly-cong-ty', 'middleware' => 'auth'], function () {
    Route::get('/danh-sach', 'Admin\CompanyController@getList');
    Route::get('/them-moi', 'Admin\CompanyController@getCreate');
    Route::post('/them-moi', 'Admin\CompanyController@postCreate');
    Route::get('/cap-nhat/{id?}', 'Admin\CompanyController@getUpdate');
    Route::post('/cap-nhat/{id?}', 'Admin\CompanyController@postUpdate');
    Route::get('/xoa/{id?}', 'Admin\CompanyController@getDelete');
});

Route::group(['prefix' => 'quan-ly-don-hang', 'middleware' => 'auth'], function () {
    Route::get('/danh-sach', 'Admin\OrderController@getList');
    Route::get('/them-moi', 'Admin\OrderController@getCreate');
    Route::post('/them-moi', 'Admin\OrderController@postCreate');
    Route::get('/cap-nhat/{id?}', 'Admin\OrderController@getUpdate');
    Route::post('/cap-nhat/{id?}', 'Admin\OrderController@postUpdate');
    Route::get('/xoa/{id?}', 'Admin\OrderController@getDelete');
});

Route::group(['prefix' => 'quan-ly-nang-cao', 'middleware' => 'auth'], function (){
    Route::get('/nhan-vien', 'Admin\AdvancedController@getStreet');
    Route::post('/nhan-vien', 'Admin\AdvancedController@postStreet');

    Route::post('/on-off', 'Admin\AdvancedController@postOnOffEmployer');
    Route::get('/on-off', 'Admin\AdvancedController@viewOnOffEmployer');
});

Route::get('/xem-vi-tri', 'Admin\AdvancedController@advancedViewLocal');
Route::post('/xem-vi-tri', 'Admin\AdvancedController@postViewLocal');

Route::get('/vi-tri-nhan-vien', 'Web\MapController@display');
Route::get('/json-nhan-vien', 'Web\MapController@getListUserJson');


Route::group(['prefix' => '/thong-tin-khach-hang', 'middleware' => 'cutomer'], function () {
    Route::get('/don-hang', 'Admin\UserController@getOrder');
    Route::get('/thong-tin', 'Admin\UserController@getInfo');
});

Route::group(['prefix' => 'quan-ly-khach-hang', 'middleware' => 'auth'], function (){
    Route::get('/danh-sach', 'Admin\UserController@getListcustomer');
    
});

