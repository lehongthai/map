<?php

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;

/*
 * Root API with GET method
 */

Route::get(
    '/', function (Request $request,ResponseFactory $response) {
    return $response->json(
        [
            'domain' => 'GiaoHang API',
            'method' => 'GET'
        ], 200
    );
}
);


/*
 * Root API with POST method
 */
Route::post(
    '/', function (Request $request,Response $response) {
    return $response->json(
        [
            'domain' => 'GiaoHang API',
            'method' => 'POST'
        ], 200
    );
}
);

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

Route::get('/lastorder', 'Api\OrderController@lastOrder');
Route::get('/listorder','Api\OrderController@getOrder');
Route::post('/order','Api\OrderController@putOrder');
