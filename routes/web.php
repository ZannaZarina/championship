<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'GameBeforePlayoffController')->name('update');
Route::get('/tables', 'CompetitionController@createDivisionTables')->name('tables');
Route::get('/play', 'QuarterfinalController')->name('play');
Route::get('/semifinal', 'SemifinalController')->name('semifinal');
Route::get('/final', 'FinalController')->name('final');
Route::get('/playoff', 'CompetitionController@runPlayoff')->name('playoff');

