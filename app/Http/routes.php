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

Route::auth();


Route::get('/', 'welcomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/lists', 'listsController@index');

Route::get('/words/{list_id}', ['as' => 'words', 'uses' => 'wordsController@index']);

Route::get('/search', 'wordsController@search');

Route::post('/words/definitions', 'wordsController@search');

Route::post('/saved', 'wordsController@store');

Route::post('/home', 'listsController@select');

Route::get('/newlist', 'listsController@add');

Route::post('/newlist/store', 'listsController@store');

Route::get('/lists/saved', 'listsController@store');

Route::get('/word/delete/{word_id}', ['as' => 'deleteWord', 'uses' => 'wordsController@delete']);

Route::get('/list/delete/{word_id}', ['as' => 'deleteList', 'uses' => 'listsController@delete']);

Route::get('/move/{word_id}/{word}/{translation}', ['as' => 'move', 'uses' => 'wordsController@move']);

Route::post('/update', 'wordsController@update');

// Route::get('words.delete', 'wordsController@delete');
