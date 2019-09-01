<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('statistics.teams');
});

Route::namespace('Statistics')
    ->prefix('statistics')
    ->name('statistics.')
    ->group(function() {
        Route::get('teams', 'TeamsController@index')->name('teams');
        Route::get('videos', 'VideosController@index')->name('videos');
});
