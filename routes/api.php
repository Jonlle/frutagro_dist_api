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

Route::prefix('v1')->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::post('register', 'API\UserController@register')->name('user.register');
        Route::post('login', 'API\UserController@login')->name('user.login');

        Route::middleware('auth:api')->group(function () {
            Route::get('user', 'API\UserController@getAuthUser')->name('user');
            Route::get('logout', 'API\UserController@logout')->name('user.logout');
        });

    });
});

