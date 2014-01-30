<?php

class ActionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function insertUser(){
		$user = new User;

		$user->username = Input::get('username');
		$user->passwd 	= Hash::make(Input::get('passwd'));
		$user->name 	= Input::get('name');
		$user->email	= Input::get('email');
		$user->contact 	= Input::get('contact');
		$user->level 	= Input::get('level');
		$user->status 	= 1;

		$user->save();

		if(Input::get('level') == '3'){
			$par = Participant;

			$par->name = Input::get('name');
			$par->email = Input::get('email');
			$par->created_by = 1;

			$par->save();
		}

		return Redirect::to('admin/list-user');
	}

	public function insertActivity(){
		$act = new Activity;

		$act->name = Input::get('name');
		$act->description = Input::get('description');
		$act->contest_id = Input::get('contest_id');
		$act->date_from = Input::get('date_from');
		$act->date_until = Input::get('date_until');
		$act->type = Input::get('type');

		$act->save();

		return Redirect::to('admin/list-activity');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}