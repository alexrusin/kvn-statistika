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

Auth::routes(['verify' => true]);

Route::namespace('Statistics')
    ->prefix('statistics')
    ->name('statistics.')
    ->group(function() {
        Route::get('teams', 'TeamsController@index')->name('teams');
        Route::get('games', 'GamesController@index')->name('games');
        Route::get('game/{id}/teams', 'TeamGamesController@show')->name('game-teams');
        Route::get('videos', 'VideosController@index')->name('videos');
});

Route::namespace('Admin')
    ->middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::prefix('enter-data')
            ->name('enter-data.')
            ->group(function(){
                Route::get('/', 'EnterDataController@index')->name('index');
                
                Route::get('games', 'EnterGameController@index')->name('games');
                Route::post('games', 'EnterGameController@store')->name('games.store');
                Route::delete('games/{game}', 'EnterGameController@destroy')->name('games.destroy');

                Route::get('teams', 'EnterTeamController@index')->name('teams');
                // Route::get('teams/paginated', 'EnterTeamController@indexPaginated');
                Route::post('teams', 'EnterTeamController@store')->name('teams.store');
                Route::delete('teams/{team}', 'EnterTeamController@destroy')->name('teams.destroy');

                Route::get('results', 'EnterResultController@index')->name('results');
                Route::post('results', 'EnterResultController@store')->name('results.store');
                Route::delete('results/{result}', 'EnterResultController@destroy')->name('results.destroy');

                Route::get('videos', 'EnterVideoController@index')->name('videos');
                Route::post('videos', 'EnterVideoController@store')->name('videos.store');
                Route::delete('videos/{video}', 'EnterVideoController@destroy')->name('videos.destroy');
            });
        
});

Route::get('/dashboard', 'HomeController@index')
    ->middleware('verified')
    ->name('dashboard');