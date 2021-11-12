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
