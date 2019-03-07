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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('events', 'EventsController@index');
Route::get('events/{event}', 'EventsController@show');
Route::post('events', 'EventsController@store');
Route::put('events/{event}', 'EventsController@update');
Route::delete('events/{event}', 'EventsController@delete');

Route::get('messages', 'MessagesController@index');
Route::get('messages/{message}', 'MessagesController@show');
Route::post('messages', 'MessagesController@store');
Route::delete('messages/{message}', 'MessagesController@delete');

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');

Route::get('users', 'UsersController@index');
Route::get('users/{user}', 'UsersController@show');
Route::put('users/{user}', 'UsersController@update');
Route::delete('users/{user}', 'UsersController@delete');

Route::get('locations', 'LocationsController@index');
Route::get('locations/{location}', 'LocationsController@show');
Route::post('locations', 'LocationsController@store');
Route::put('locations/{location}', 'LocationsController@update');
Route::delete('locations/{location}', 'LocationsController@delete');
 
Route::get('init', function() {
    $exitCode = Artisan::call('passport:install');
});

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');
});
