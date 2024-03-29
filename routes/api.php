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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(
    [
        'prefix' => 'auth'
    ],
    function () {
        Route::post('login', 'AuthController@login');
        Route::post('signup', 'AuthController@signup');

        Route::group([
            'middleware' => 'auth:api'
        ], function () {
            Route::get('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
        });
    }
);


Route::group(
    ['middleware' => 'auth:api'],
    function () {
        Route::resource('clients', 'ClientController')->only([
            'index', 'show'
        ]);

        Route::resource('trips', 'TripController')->only([
            'index', 'show'
        ]);

        Route::resource('countries', 'CountriesController')->only([
            'index'
        ]);

        Route::resource('airlines', 'AirlinesController')->only([
            'index', 'show'
        ]);

        Route::resource('cities', 'CitiesController')->only([
            'index'
        ]);

        Route::resource('quicksearchs', 'QuicksearchController')->only([
            'index'
        ]);
    }
);
