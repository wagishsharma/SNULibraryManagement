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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('book','BookController');

Route::get('/showQR','BookController@showQR');
Route::get('/user/{id}/book/{book_id}','BookController@storeBook');
Route::auth();
Route::get('/user/{id}/book/{book_id}/delete','BookController@returnBook');

Route::get('/home', 'HomeController@index');
