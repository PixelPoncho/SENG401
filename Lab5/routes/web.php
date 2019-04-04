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
Route::get('commentDestroy/{id}', 'CommentController@destroy');

Route::get('addSubscription', 'SubscriptionController@create');
Route::get('editSubscription/{id}', 'SubscriptionController@edit');
Route::post('addSubscription', 'SubscriptionController@store');
Route::patch('editSubscription', 'SubscriptionController@update');

//Route::get('/booksByISBN/{isbn}', 'BooksByISBNController@index');

Route::get('/book_details/{id}', 'BookController@index');
Route::patch('book_details/{id}', 'BookController@update');
Route::post('bookAdd', 'BookController@store');
Route::get('addBook', 'BookController@create');
Route::get('destroyBook/{id}','BookController@destroy');

Route::get('/home', 'HomeController@index')->name('home');  //This cannot be taken out. Stuff breaks.

Route::get('editAuthor/{id}', 'AuthorController@edit');
Route::get('addAuthor', 'AuthorController@create');
Route::post('addAuthor', 'AuthorController@store');
Route::patch('editAuthor', 'AuthorController@update');

//User homepages
Route::get('/visitor', 'HomeController@visitor');
Route::get('/subscriber', 'HomeController@subscriber');
Route::get('/admin', 'HomeController@admin');

Route::get('editUser/{id}', 'UserController@edit');
Route::patch('editUser', 'UserController@update');

//Route::post('register', 'AuthController@register');
//Route::post('login', 'AuthController@login');
Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
