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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('/rides', 'RidesController@rides');

Route::get('/rides/create', 'RidesController@create');

Route::get('/rides/search', 'RidesController@search');

Route::get('/rides/results', 'RidesController@results');

Route::get('/rides/{id}', 'RidesController@detailview');

Route::post('/rides', 'RidesController@addNewRide');

Route::get('/newLocation', 'LocationController@createLoc');

Route::post('/locations', 'LocationController@addNewLocation');

Route::get('/locations/{id}', 'LocationController@aboutLocation');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
// Route::get('/dash-board',['as'=>'dash-board','uses'=>"DashBoardController@index"]);
 
Route::controller('/','Auth\AuthController');