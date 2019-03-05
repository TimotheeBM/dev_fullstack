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
Route::post('events','EventsController@store');
Route::put('events/{events}','EventsController@update');
Route::delete('events/{eventId}', 'EventsController@delete');

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');
 
Route::get('init', function() {
    $exitCode = Artisan::call('passport:install');
});

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');
});
