<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UpdateDatabaseController@playGamesBeforePlayoff')->name('update');
Route::get('/tables', 'CompetitionController@createDivisionTables')->name('tables');
Route::get('/play', 'UpdateDatabaseController@playoff')->name('play');
Route::get('/playoff', 'CompetitionController@runPlayoff')->name('playoff');

