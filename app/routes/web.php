<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Not professional way to do it (works for a small app)
//Route::get('books', function () {
//
//    $books = ['Peter Pan', 'Design of everyday things', 'Creativity Inc.'];
//    return view('quotes.books', compact('books'));
//});

Route::get('books', 'PagesController@books');

// Best way to do it (through a Controller)
// Movies
Route::get('movies', 'PagesController@movies')->middleware('auth');

// All content
Route::get('all', 'PagesController@all');

// A specific quote
Route::get('/home/{content}', 'PagesController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('profile', 'PagesController@profile')->middleware('auth');

Route::post('profile', 'PagesController@update');

Route::post('movies', 'PagesController@create');

Route::post('movies2','PagesController@change');

Route::post('movies3','PagesController@delete');

Route::post('/avatars','PagesController@avatar');

Route::post('/content_images', 'PagesController@content_images');

//Excel export download
Route::get('export', 'ExcelController@export');
