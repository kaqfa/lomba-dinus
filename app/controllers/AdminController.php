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

	public function createContest(){
		$this->layout->content = View::make('form_contest', array('action'=>'Menambahkan'));
	}

	public function listContest(){
		$this->layout->content = View::make('list_contest');
	}

	public function createGroup(){
		$this->layout->content = View::make('form_group');
	}

	public function createActivity(){
		$this->layout->content = View::make('form_activity');
	}	

}