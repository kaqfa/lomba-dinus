<?php

class UserController extends BaseController{
	
	public function insertUser(){
		$user = new User;

		$user->username = Input::post('username');
		$user->password = Input::post('password');
		$user->name = Input::post('name');
		$user->email = Input::post('email');
		$user->contact = Input::post('contact');
		$user->level = Input::post('contact');
		$user->status = Input::post('status');

		$user->save();
	}
}