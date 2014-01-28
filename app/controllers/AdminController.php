<?php

class AdminController extends BaseController {

	protected $layout = 'layouts.adminbase';

	public function dashboard()
	{
		$this->layout->content = View::make('dashboard');
	}
	
	public function createUser(){
		$this->layout->content = View::make('form_user',array('action'=>'Membuat'));
	}
	
	public function editUser(){
		$this->layout->content = View::make('form_user');
	}
	
	public function listUser(){
		$this->layout->content = View::make('list_user');
	}

}