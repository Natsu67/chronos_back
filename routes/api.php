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

/**
 * Authorization module
 */
Route::prefix('auth')->group(function () {
    Route::post('/register', 'App\Http\Controllers\AuthController@register');
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
});

Route::prefix('users')->group(function () {
    Route::get('', 'App\Http\Controllers\UserController@index');
    Route::get('/{user_id}', 'App\Http\Controllers\UserController@show');
    Route::patch('/{user_id}', 'App\Http\Controllers\UserController@update');
    Route::delete('/{user_id}', 'App\Http\Controllers\UserController@destroy');
});

Route::prefix('calendars')->group(function () {
    Route::post('/', 'App\Http\Controllers\CalendarController@createCalendar');
    Route::get('/getCalendarsForUser', 'App\Http\Controllers\CalendarController@getCalendarsForUser');
    Route::get('/getUsersForCalendar/{calendar_id}', 'App\Http\Controllers\CalendarController@getUsersForCalendar');
    Route::get('/{calendar_id}', 'App\Http\Controllers\CalendarController@getCalendar');
    Route::patch('/{calendar_id}', 'App\Http\Controllers\CalendarController@update');
    Route::delete('/{calendar_id}', 'App\Http\Controllers\CalendarController@destroy');
});

Route::prefix('events')->group(function () {
    Route::post('/{calendar_id}', 'App\Http\Controllers\EventController@createEventForCalendar');
    Route::get('/{calendar_id}', 'App\Http\Controllers\EventController@getEventsForCalendar');
});
