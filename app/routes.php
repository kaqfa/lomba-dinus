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

Route::get('/trans', function(){
	return View::make('test/testbase');
});

Route::group(array('prefix'=>'/admin'), function()
{
	Route::any('/', 'AdminController@dashboard');
	Route::post('/login', 'ActionController@userLogin');
	Route::get('/logout', 'ActionController@logout');

	Route::get('/create-user', 'AdminController@createUser');
	Route::get('/create-group/{partId}', 'AdminController@createGroup');	
	Route::get('/create-contest', 'AdminController@createContest');
	Route::get('/create-activity', 'AdminController@createActivity');
	Route::get('/create-test', 'AdminController@createTest');
	Route::get('/create-question/{testId}', 'AdminController@createQuestion');

	Route::get('/list-user', 'AdminController@listUser');
	Route::get('/list-group', 'AdminController@listGroup');
	Route::get('/list-contest', 'AdminController@listContest');
	Route::get('/list-activity', 'AdminController@listActivity');
	Route::get('/list-participant', 'AdminController@listParticipant');
	Route::get('/list-test', 'AdminController@listTest');
	Route::get('/list-question/{testId}', 'AdminController@listQuestion');

	Route::get('/edit-user/{id}', 'AdminController@editUser');
	Route::get('/edit-group/{partId}', 'AdminController@editGroup');	
	Route::get('/edit-contest/{id}', 'AdminController@editContest');
	Route::get('/edit-activity/{id}', 'AdminController@editActivity');
	Route::get('/edit-test/{id}', 'AdminController@editTest');
	Route::get('/edit-question/{questId}', 'AdminController@editQuestion');

	Route::get('/del-user/{id}', 'ActionController@delUser');
	Route::get('/del-group/{id}', 'ActionController@delGroup');	
	Route::get('/del-contest/{id}', 'ActionController@delContest');
	Route::get('/del-activity/{id}', 'ActionController@delActivity');
	Route::get('/del-question/{id}', 'ActionController@delQuestion');
	Route::get('/del-test/{id}', 'ActionController@delTest');

	Route::post('/user/insert', 'ActionController@insertUser');
	Route::post('/activity/insert', 'ActionController@insertActivity');
	Route::post('/question/save', 'ActionController@saveQuestion');
	Route::post('/contest/save', 'ActionController@saveContest');
	Route::post('/test/save', 'ActionController@saveTest');
	Route::post('/group/insert', 'ActionController@insertGroup');	
	Route::post('/act-contest/save', 'ActionController@actContest');	
	// Route::post('/group/edit', 'ActionController@editGroup');

	Route::get('/contest-act/{id}', 'AdminController@contestAct');		

	Route::get('/test/{num}', 'ContestController@index');
});

Route::get('/dl/{dir}/{url}',function($dir,$url){
  //PDF file is stored under project/public/download/info.pdf
  $file= public_path(). "/uploads/".$dir.'/'.$url;  
  return Response::download($file, $url);
});

Route::get('/insertGroup', function(){
	$part = Participant::create( array('nim'=>'A12345', 'name'=>'Giyan Ayu', 
			'email'=>'gigiyayan@gmail.com', 'contact'=>'0987654321', 
			'created_by'=>'1') );

	$group = Group::create(array('name'=>'group hura2', 'advisor'=>'sembarang',
			'contact'=>'0987665123', 'contest_id'=>'1'));

	$part->groupMember()->attach($group->id, array('role'=>'1'));
});

Route::get('/delGroup', function(){
	$part = Participant::where('nim', '=', 'A12345')->first();
	$group = Group::where('name', '=','group hura2')->first();
	Participant::where('nim', '=', 'A12345')->delete();
	Group::where('name', '=','group hura2')->delete();
	$part->groupMember()->detach($group->id);
	//print_r($part);

});

Route::get('/', function()
{
	return View::make('login');
});

Route::get('/user', function()
{
	var_dump(User::all());
});