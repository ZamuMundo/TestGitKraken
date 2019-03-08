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
    return view('welcome');
});

/**
* Route View candidates and Jobs
*
*/
Route::get('candidates', 'CandidateController@index');

Route::get('jobs', 'JobController@index');

/**
* Import csv candidates File
*
*/
Route::get('import_candidates', 'CandidateController@importCandidateCSV');
/**
* Import csv jobs File
*
*/
Route::get('import_jobs', 'CandidateController@importCandidateCSV');
