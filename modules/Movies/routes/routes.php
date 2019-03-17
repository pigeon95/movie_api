<?php

Route::group([
    'middleware' => ['api'],
    'namespace' => 'Movies\Controllers',
    'prefix' => 'api'
], function () {
    Route::get('/movies', [
        'uses' => 'MovieController@getMovies'
    ]);

    Route::get('/movie/{movie}', [
        'uses' => 'MovieController@getMovie'
    ]);

    Route::post('/movie/{movie}/rate', [
        'uses' => 'RateController@postRate'
    ]);
});