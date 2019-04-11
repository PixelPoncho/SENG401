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

use App\User;
use Illuminate\Http\Request;

Route::get('/', function () {
  /*$user = new \App\User();
  $user -> email = 'godard.nathan@icloud.com';
  $user -> password = Hash::make('Password');
  $user -> name = 'Nathan';
  $user->save();*/
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/add_account', 'AccountController@store');

Route::get('/account_details/{id}', 'AccountController@index');
Route::patch('account_details/{id}', 'AccountController@update');

Route::post('withdraw/{id}', 'TransactionController@withdraw');
Route::post('deposit/{id}', 'TransactionController@deposit');
Route::post('transfer/{id}', 'TransactionController@transfer');
