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

Route::get('commentEdit/{id}', 'CommentController@edit');
Route::get('commentAdd/{id}', 'CommentController@create');
Route::post('commentAdd', 'CommentController@store');
Route::patch('commentEdit', 'CommentController@update');

Route::get('addSubscription', 'SubscriptionController@create');
Route::get('editSubscription/{id}', 'SubscriptionController@edit');
Route::post('addSubscription', 'SubscriptionController@store');
Route::patch('editSubscription', 'SubscriptionController@update');

Route::get('/book_details/{id}', 'BookController@index'); //There should be some difference between these
Route::resource('book_details', 'BookController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');  //This cannot be taken out. Stuff breaks.

//User homepages
Route::get('/visitor', 'HomeController@visitor');
Route::get('/subscriber', 'HomeController@subscriber');
Route::get('/admin', 'HomeController@admin');

Route::get('editUser/{name, role}', 'UserController@edit');

//Route::get('/book_details/{id}','BookController@bookDetails');
//Route::get('/book_edit/{id}','BookController@edit');
//Route::resource('book_edit','BookController');

// Route::get('/updating/{book}/edit', 'BookController@edit');
// Route::patch('/updating/{book}', 'BookController@update');
//END NEW STUFF
