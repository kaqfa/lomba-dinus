<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix'=>'/admin'), function()
{
	Route::any('/', 'AdminController@dashboard');

	Route::get('/create-user', 'AdminController@createUser');
	Route::get('/create-group', 'AdminController@createGroup');	
	Route::get('/create-contest', 'AdminController@createContest');
	Route::get('/create-activity', 'AdminController@createActivity');

	Route::get('/list-user', 'AdminController@listUser');
	Route::get('/list-group', 'AdminController@listGroup');
	Route::get('/list-contest', 'AdminController@listContest');
	Route::get('/list-activity', 'AdminController@listActivity');
	Route::get('/list-participant', 'AdminController@listParticipant');
});

Route::get('/', function()
{
	return View::make('login');
});

Route::get('/user', function()
{
	var_dump(User::all());
});