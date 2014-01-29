<?php

class AdminController extends BaseController {

	protected $layout = 'layouts.adminbase';
	protected $data = null;

	public function __construct(){
		$this->data['userLevel'] = array('1'=>'Administrator', '2'=>'Juri Lomba', '3'=>'Peserta Lomba');
	}

	public function dashboard()
	{
		$this->layout->content = View::make('dashboard');
	}
	
	public function createUser(){
		$this->data['action'] = 'Membuat'; 
		$this->layout->content = View::make('form_user', $this->data);
	}
	
	public function editUser($idUser){
		$this->data['user'] = User::find($idUser);
		$this->data['action'] = 'Memperbaharui';
		
		$this->layout->content = View::make('form_user', $this->data);
	}
	
	public function listUser(){
		$this->data['users'] = User::all()->toArray();

		$this->layout->content = View::make('list_user', $this->data);
	}

	public function listParticipant(){
		$this->layout->content = View::make('list_participant');
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