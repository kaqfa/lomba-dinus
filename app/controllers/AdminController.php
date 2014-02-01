<?php

class AdminController extends BaseController {

	protected $layout = 'layouts.adminbase';
	protected $data = null;

	public function __construct(){
		$this->data['userLevel'] = array('1'=>'Administrator', '2'=>'Juri Lomba', '3'=>'Peserta Lomba');
		$this->data['actType'] = array('1'=>'Input Teks', '2'=>'Upload File', '3'=>'Tes Online');
		View::share('contestMenu', Activity::get(array('id','name')));
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
		$this->data['participants'] = Participant::all()->toArray;
		$i = 0;
		foreach ($data['participants'] as $data) {
			$contests = DB::select('select g.name as contest,  from groups g 
					join group_members gm on (g.id = gm.groups_id)
					join contest c on (c.id = g.contest_id)
					where gm.participant_id = ?', array($data['id']));
			$this->data['participants'][$i]['contests'] = $contests->toArray();
			$i++;
		}

		$this->layout->content = View::make('list_participant', $this->data);
	}

	public function createContest(){
		$this->layout->content = View::make('form_contest', array('action'=>'Menambahkan'));
	}

	public function listContest(){
		$q = 'select id,name,description,
				(select count(*) from groups where contest_id = c.id) as groupnum
				from contests c';
		$this->data['contests'] = DB::select($q);

		$this->layout->content = View::make('list_contest', $this->data);
	}

	public function createGroup(){
		$this->layout->content = View::make('form_group');
	}

	public function listGroup(){		
		$q = 'select g.id as id, g.name as name, p.name as leader, advisor, 
					 g.contact as contact, c.name as contest
					from groups g 
					join group_members gm on (group_id = g.id)
					join participants p on (gm.participant_id = p.id)
					join contests c on (c.id = g.contest_id)
					where gm.role = ? ';
		$this->data['groups'] = DB::select($q, array('advisor'));

		$this->layout->content = View::make('list_group', $this->data);
	}

	public function createActivity(){
		$this->layout->content = View::make('form_activity');
	}	

	public function listActivity(){
		$this->data['acts'] = Activity::all()->toArray();

		$this->layout->content = View::make('list_activity', $this->data);
	}

	public function contestAct($id){
		$activity = Activity::find($id);

		$this->data['act'] = array('name'=>$activity->name, 'type' => '3'); // $activity->type
		
		if($this->data['act']['type'] != '3'){
			$this->layout->content = View::make('form_act_contest', $this->data);
		} else {
			$this->data['pageNum'] = 1;
			$this->layout->content = View::make('test_welcome', $this->data);
		}
	}

}