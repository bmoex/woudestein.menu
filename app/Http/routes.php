<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Public pages
Route::group(
    ['before' => 'guest'],
    function () {
        Route::get('/', array('as' => 'root', 'uses' => 'MapController@index'));

        // Location routes
        Route::group(['prefix' => 'location'], function () {
            Route::get('detail/{identifier}', array('as' => 'location-show', 'uses' => 'LocationController@show'));
        });
    }
);

// Protected pages
Route::group(
    ['before' => 'auth'],
    function () {
    }
);