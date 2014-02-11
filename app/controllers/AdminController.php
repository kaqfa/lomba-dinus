<?php

class AdminController extends BaseController {

	protected $layout = 'layouts.adminbase';
	protected $data = null;

	public function __construct(){
		$this->data['userLevel'] = array('1'=>'Administrator', '2'=>'Juri Lomba', '3'=>'Peserta Lomba');
		$this->data['actType'] = array('1'=>'Input Teks', '2'=>'Upload File', '3'=>'Tes Online');		
		View::share('contestMenu', $this->selectContest());
		$this->beforeFilter('auth');
	}	

	private function selectContest(){
		$select = array();
		$contests = Contest::all(array('id', 'name'));
		$i = 0;		
		foreach ($contests as $data) {
			$select[$data['id']] = $data['name'];
			$i++;
		}

		return $select;
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
		$this->data['valUser'] = User::find($idUser);
		$this->data['action'] = 'Memperbaharui';
		
		$this->layout->content = View::make('form_user', $this->data);
	}
	
	public function listUser(){
		$this->data['users'] = User::all()->toArray();

		$this->layout->content = View::make('list_user', $this->data);
	}

	public function listParticipant(){
		$this->data['participants'] = Participant::all()->toArray();		
		$i = 0;
		foreach ($this->data['participants'] as $data) {
			$contests = DB::select('select g.name as contest from groups g 
					join group_member gm on (g.id = gm.group_id)
					join contests c on (c.id = g.contest_id)
					where gm.participant_id = ?', array($data['id']));
			$this->data['participants'][$i]['contests'] = $contests;
			//print_r($this->data['participants'][$i]);
			$i++;
		}

		$this->layout->content = View::make('list_participant', $this->data);
	}

	public function createContest(){
		$this->layout->content = View::make('form_contest', array('action'=>'Menambahkan'));
	}

	public function editContest($contestId){
		$this->data['contest'] = Contest::find($contestId);
		$this->data['action'] = 'Menambahkan';
		$this->layout->content = View::make('form_contest', $this->data);
	}

	public function listContest(){
		$q = 'select id,name,description,
				(select count(*) from groups where contest_id = c.id) as groupnum
				from contests c';
		$this->data['contests'] = DB::select($q);

		$this->layout->content = View::make('list_contest', $this->data);
	}	

	public function createGroup($partId){
		$this->data['part'] = Participant::find($partId);
		$this->data['participantId'] = $partId;
		$this->data['contests'] = $this->selectContest();
		
		$this->layout->content = View::make('form_group', $this->data);
	}	

	public function editGroup($groupId){
		$this->data['valGroup'] = Group::find($groupId);
		$this->data['members'] 	= $this->data['valGroup']->groupMember()->withPivot('role')->orderBy('role')->get();
		$this->data['contests'] = $this->selectContest();

		//print_r($this->data['members']);

		$this->layout->content = View::make('form_group', $this->data);
	}

	public function listGroup(){		
		$q = 'select g.id as id, g.name as name, p.name as leader, advisor, 
					 g.contact as contact, c.name as contest
					from groups g 
					join group_member gm on (group_id = g.id)
					join participants p on (gm.participant_id = p.id)
					join contests c on (c.id = g.contest_id)
					where gm.role = ? ';
		$this->data['groups'] = DB::select($q, array('1'));

		$this->layout->content = View::make('list_group', $this->data);
	}

	public function createActivity(){
		$this->layout->content = View::make('form_activity');
	}	

	public function editActivity($activityId){
		$this->data['activity'] = Activity::find($activityId);
		$this->layout->content = View::make('form_activity', $this->data);
	}

	public function listActivity(){
		$this->data['acts'] = Activity::with('contest')->get()->toArray();
		//print_r(DB::getQueryLog());
		$this->layout->content = View::make('list_activity', $this->data);
	}

	public function createTest(){

	}

	public function editTest(){

	}

	public function listTest(){
		$this->data['tests'] = Test::all()->toArray();
		$this->layout->content = View::make('list_test', $this->data);
	}

	public function createQuestion($testId){
		$this->data['testId'] = $testId;
		$this->layout->content = View::make('form_question', $this->data);
	}

	public function editQuestion(){

	}

	public function listQuestion($testId){
		$test = Test::find($testId);
		$this->data['testName'] = $test->name;		
		$this->data['testId'] 	= $test->id;
		$this->data['quests'] 	= Question::where('test_id', '=', $testId)->get();		
		$this->layout->content 	= View::make('list_question', $this->data);
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