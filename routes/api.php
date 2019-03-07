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
Route::get('events/{eventId}', 'EventsController@show');
Route::post('events', 'EventsController@store');
Route::put('events/{eventId}', 'EventsController@update');
Route::delete('events/{eventId}', 'EventsController@delete');

Route::get('messages', 'MessagesController@index');
Route::get('messages/{messageId}', 'MessagesController@show');
Route::post('messages', 'MessagesController@store');
Route::delete('messages/{messageId}', 'MessagesController@delete');

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');

Route::get('users', 'UsersController@index');
Route::get('users/{userId}', 'UsersController@show');
Route::put('users/{userId}', 'UsersController@update');
Route::delete('users/{userId}', 'UsersController@delete');

Route::get('locations', 'LocationsController@index');
Route::get('locations/{locationId}', 'LocationsController@show');
Route::post('locations', 'LocationsController@store');
Route::put('locations/{locationId}', 'LocationsController@update');
Route::delete('locations/{locationId}', 'LocationsController@delete');
 
Route::get('init', function() {
    $exitCode = Artisan::call('passport:install');
});

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');
});
