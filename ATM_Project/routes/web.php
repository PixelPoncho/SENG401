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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/account_details/{id}', 'AccountController@index');
Route::patch('account_details/{id}', 'AccountController@update');

Route::get('\withdraw\{{ $account->id }}', 'TransactionController@withdraw');
Route::get('\deposit\{{ $account->id }}', 'TransactionController@deposit');
Route::get('\transfer\{{ $account->id }}', 'TransactionController@transfer');
