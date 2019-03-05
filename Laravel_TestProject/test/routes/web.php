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


	/* '/' means root of the application */
Route::get('/', function () {
		// Knows we we mean "welcome.blade.php"
    return view('welcome');
});

Route::get('/lectures', function () {

	$titles = ["SA", "Quality Attributes", "Architecture Patterns", "UML", "REST"];
	$cars = ["Volvo", "Cadillac"];

		// Passing second argument to view function called titles with value
		// of $titles
   // return view('lectures', ["titles"=>$titles]);

		// attaching with function to the view function
		// Now we are sending two sets of variables
	return view('lectures')->with('titles', $titles)->with('cars', $cars);
});

Route::get('/students', function () {
    return view('students');
});

Route::get('/labs', function () {
    return view('labs');
});

// get, post, put, delete -- major things on Route that we use
