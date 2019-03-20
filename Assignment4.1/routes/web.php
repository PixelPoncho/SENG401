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

Route::get('books', function (){
  return view('books');
});

Route::get('book_details', 'BookController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');  //This cannot be taken out. Stuff breaks.

//NEW STUFF
Route::get('/visitor', 'HomeController@visitor');
Route::get('/subscriber', 'HomeController@subscriber');
Route::get('/admin', 'HomeController@admin');

Route::resource('book_details', 'BookController');
//Route::get('/book_details/{id}','BookController@bookDetails');
//Route::get('/book_edit/{id}','BookController@edit');
//Route::resource('book_edit','BookController');

// Route::get('/updating/{book}/edit', 'BookController@edit');
// Route::patch('/updating/{book}', 'BookController@update');
//END NEW STUFF
