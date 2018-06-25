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

Route::get('/', 'ColorController@index');
Route::post('/', 'ColorController@store');
Route::get('/{color}', 'ColorController@show');
Route::put('/{color}', 'ColorController@update');
Route::delete('/{color}', 'ColorController@destroy');
