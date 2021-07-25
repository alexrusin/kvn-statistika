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

Auth::routes(['verify' => true]);

Route::get('/', 'Statistics\TeamsController@index')->name('index');

Route::namespace('Statistics')
    ->prefix('statistics')
    ->name('statistics.')
    ->group(function () {
        Route::get('teams/{team}', 'TeamsController@show');
        Route::get('teams/{id}/score','TeamsController@score');
        Route::get('teams-data', 'TeamsController@getTeamsData')->name('teams-data');
        Route::get('games', 'GamesController@index')->name('games');
        Route::get('game/{id}/teams', 'TeamGamesController@show')->name('game-teams');
        Route::get('videos', 'VideosController@index')->name('videos');
    });

Route::namespace('Blog')
    ->prefix('blog')
    ->name('blog.')
    ->group(function () {
        Route::get('/', 'PostController@index')->name('index');
        Route::get('/tags/{tag}', 'TagController@show')->name('tag.show');
        Route::get('/posts/{post}', 'PostController@show')->name('show');
    });

Route::namespace('Admin')
    ->middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::prefix('enter-data')
            ->name('enter-data.')
            ->group(function () {
                Route::get('/', 'EnterDataController@index')->name('index');

                Route::get('games', 'EnterGameController@index')->name('games');
                Route::post('games', 'EnterGameController@store')->name('games.store');
                Route::put('games/{id}', 'EnterGameController@update')->name('games.update');
                Route::delete('games/{game}', 'EnterGameController@destroy')->name('games.destroy');

                Route::get('teams', 'EnterTeamController@index')->name('teams');
                Route::post('teams', 'EnterTeamController@store')->name('teams.store');
                Route::put('teams/{id}', 'EnterTeamController@update')->name('teams.update');
                Route::delete('teams/{team}', 'EnterTeamController@destroy')->name('teams.destroy');

                Route::get('results', 'EnterResultController@index')->name('results');
                Route::post('results', 'EnterResultController@store')->name('results.store');
                Route::put('results/{id}', 'EnterResultController@update')->name('results.update');
                Route::delete('results/{result}', 'EnterResultController@destroy')->name('results.destroy');

                Route::get('videos', 'EnterVideoController@index')->name('videos');
                Route::post('videos', 'EnterVideoController@store')->name('videos.store');
                Route::put('videos/{id}', 'EnterVideoController@update')->name('videos.update');
                Route::delete('videos/{video}', 'EnterVideoController@destroy')->name('videos.destroy');
            });
    });

Route::namespace('Api')
    ->middleware(['auth', 'verified', 'admin'])
    ->prefix('api')
    ->name('api.')
    ->group(function () {
        Route::prefix('images')
            ->name('images.')
            ->group(function () {
                Route::post('/', 'ImagesController@store')->name('store');
            });
    });

Route::namespace('Api')
    ->middleware(['auth', 'verified'])
    ->prefix('api')
    ->name('reviews.')
    ->group(function () {
        Route::prefix('reviews')
            ->group(function () {
                Route::get('/user/{teamId}', 'ReviewsController@getUserTeamReview')->name('user-team');
                Route::post('/{teamId}', 'ReviewsController@save')->name('save');
            });
    });

Route::namespace('Auth')
    ->group(function () {
        Route::get('/vk/login', 'VkLoginController@login');
    });

Route::get('/dashboard', 'HomeController@index')
    ->middleware('verified')
    ->name('dashboard');
