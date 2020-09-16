<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/model/{model}', 'Api\ModelController@show');

Route::get('notifications', 'Admin\NotificationController@create');
Route::put('notifications/{notification}', 'Admin\NotificationController@markAsRead');
Route::delete('notifications/{notification}', 'Admin\NotificationController@destroy');
