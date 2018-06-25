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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', 'DragonController@index');
Route::post('/', 'DragonController@store');
Route::get('/{dragon}', 'DragonController@show');
Route::put('/{dragon}', 'DragonController@update');
Route::delete('/{dragon}', 'DragonController@destroy');
