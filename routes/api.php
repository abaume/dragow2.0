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

Route::get('/users', 'UserController@index');
Route::post('/user', 'GuildController@store');
Route::get('/user/{user}', 'GuildController@show');
Route::put('/user/{user}', 'GuildController@update');
Route::delete('/user/destroy/{user}', 'GuildController@destroy');

Route::get('/guilds', 'GuildController@index');
Route::post('/guild', 'GuildController@store');
Route::get('/guild/{guild}', 'GuildController@show');
Route::put('/guild/{guild}', 'GuildController@update');
Route::delete('/guild/destroy/{guild}', 'GuildController@destroy');

Route::get('/breedings', 'BreedingController@index');
Route::post('/breeding', 'BreedingController@store');
Route::get('/breeding/{breeding}', 'BreedingController@show');
Route::put('/breeding/{breeding}', 'BreedingController@update');
Route::delete('/breeding/destroy/{breeding}', 'BreedingController@destroy');

Route::get('/colors', 'ColorController@index');
Route::post('/color', 'ColorController@store');
Route::get('/color/{color}', 'ColorController@show');
Route::put('/color/{color}', 'ColorController@update');
Route::delete('/color/destroy/{color}', 'ColorController@destroy');

Route::get('/contests', 'ContestController@index');
Route::post('/contest', 'ContestController@store');
Route::get('/contest/{contest}', 'ContestController@show');
Route::put('/contest/{contest}', 'ContestController@update');
Route::delete('/contest/destroy/{contest}', 'ContestController@destroy');

Route::get('/dragons', 'DragonController@index');
Route::post('/dragon', 'DragonController@store');
Route::get('/dragon/{dragon}', 'DragonController@show');
Route::put('/dragon/{dragon}', 'DragonController@update');
Route::delete('/dragon/destroy/{dragon}', 'DragonController@destroy');

Route::get('/races', 'RaceController@index');
Route::post('/race', 'RaceController@store');
Route::get('/race/{race}', 'RaceController@show');
Route::put('/race/{race}', 'RaceController@update');
Route::delete('/race/destroy/{race}', 'RaceController@destroy');

Route::get('/totems', 'TotemController@index');
Route::post('/totem', 'TotemController@store');
Route::get('/totem/{totem}', 'TotemController@show');
Route::put('/totem/{totem}', 'TotemController@update');
Route::delete('/totem/destroy/{totem}', 'TotemController@destroy');

Route::get('/participations', 'ParticipationController@index');
Route::post('/participation', 'ParticipationController@store');
Route::get('/participation/{participation}', 'ParticipationController@show');
Route::put('/participation/{participation}', 'ParticipationController@update');
Route::delete('/participation/destroy/{participation}', 'ParticipationController@destroy');