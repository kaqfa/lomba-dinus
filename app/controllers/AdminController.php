<?php

class AdminController extends BaseController {

	protected $layout = 'layouts.adminbase';
	protected $data = null;

	public function __construct(){
		$this->data['userLevel'] = array('1'=>'Administrator', '2'=>'Juri Lomba', '3'=>'Peserta Lomba');
		$this->data['actType'] = array('1'=>'Input Teks', '2'=>'Upload File', '3'=>'Tes Online');

		$userContest = $this->getUserActivities();		

		View::share('contestMenu', Activity::whereIn('contest_id', $userContest)->get());
		//print_r(Activity::whereIn('contest_id', $userContest)->get());
		$this->beforeFilter('auth');		
	}

	private function getUserActivities(){
		$acts = null;				

		if(Session::get('theUser')->level == 3)
			$acts = DB::table('users')
								->join('participants', 'users.id', '=', 'participants.user_id')
								->join('group_member', 'participants.id', '=', 'group_member.participant_id')
								->join('groups', 'groups.id', '=', 'group_member.group_id')
								->where('users.id', Session::get('theUser')->id)
								->get(array('contest_id'));
		else if(Session::get('theUser')->level == 2)
			$acts = DB::table('users')
								->join('juries', 'users.id', '=', 'juries.user_id')								
								->where('users.id', Session::get('theUser')->id)
								->get(array('contest_id'));
		else 
			$acts = Activity::groupBy('contest_id')->get(array('contest_id'));		

		$theContests = array();
		foreach ($acts as $value) {
			$theContests[] = $value->contest_id;
		}		

		if(count($theContests) < 1)
			$theContests[0] = 0;

		return $theContests;
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
		$curUser = Session::get('theUser');
		if($curUser->level == 1){
			$this->data['users'] = User::all()->toArray();
			$this->layout->content = View::make('list_user', $this->data);
		} else {
			return Redirect::to('admin/edit-user/'.$curUser->id);
		}
	}

	public function listParticipant(){
		$this->data['participants'] = Participant::all()->toArray();		
		$i = 0;
		foreach ($this->data['participants'] as $data) {
			$contests = DB::select('select g.name as contest from lmb_groups g 
					join lmb_group_member gm on (g.id = gm.group_id)
					join lmb_contests c on (c.id = g.contest_id)
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

		//print_r($this->data);
		
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
					from lmb_groups g 
					join lmb_group_member gm on (group_id = g.id)
					join lmb_participants p on (gm.participant_id = p.id)
					join lmb_contests c on (c.id = g.contest_id)
					where gm.role = ? ';
		$this->data['groups'] = DB::select($q, array('1'));

		$this->layout->content = View::make('list_group', $this->data);			
	}

	public function createActivity(){
		$this->data['selectContest'] = $this->selectContest();
		$this->layout->content = View::make('form_activity', $this->data);
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
		$select = array();
		$acts = Activity::where('type', '3')->get(array('id', 'name'));
		$i = 0;		
		foreach ($acts as $data) {
			$select[$data['id']] = $data['name'];
			$i++;
		}
		$this->data['select'] = $select;

		$this->layout->content = View::make('form_test', $this->data);
	}

	public function editTest($id){
		$select = array();
		$acts = Activity::where('type', '3')->get(array('id', 'name'));
		$i = 0;		
		foreach ($acts as $data) {
			$select[$data['id']] = $data['name'];
			$i++;
		}
		$this->data['select'] = $select;

		$this->data['test'] = Test::find($id);

		$this->layout->content = View::make('form_test', $this->data);
	}

	public function listTest(){
		$this->data['tests'] = Test::all()->toArray();
		$this->layout->content = View::make('list_test', $this->data);
	}

	public function createQuestion($testId){
		$this->data['testId'] = $testId;
		$this->layout->content = View::make('form_question', $this->data);
	}

	public function editQuestion($questId){
		$this->data['quest'] = Question::find($questId);		
		$this->layout->content = View::make('form_question', $this->data);
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
		$groupAct = DB::table('group_activity')
						->where('group_id',Session::get('theGroups')[0])
						->where('activity_id',$id);						

		$this->data['act'] = array('name'=>$activity->name, 'type' => $activity->type, 'id'=>$id);
		$this->data['activity'] = $activity;
		
		if($this->data['act']['type'] != '3'){
			if($groupAct->count() < 1){
				DB::table('group_activity')->insert(array('group_id'=>Session::get('theGroups')[0], 
							'activity'=>$activity->name, 'description'=>'-', 'activity_id'=>$id, 
							'file'=>'-', 'file_type'=>'0'));				
			}
			$this->data['groupAct'] = $groupAct->first(array('id', 'activity', 'description','file', 'file_type'));			

			$this->layout->content = View::make('form_act_contest', $this->data);
		} else {							
			$this->data['testId'] = Test::where('activity_id', $id)->first()->id;
			$this->layout->content = View::make('test_welcome', $this->data);
		}
	}

	public function juryAct($id){
		$act = Activity::find($id);
		$groups = Group::where('contest_id', $act->contest_id)->get();

		foreach ($groups as $group) {
			$group->score = 'Belum Dinilai';
			if(strtotime($act->date_from) > time()){
				$group->status = 'Belum Mulai';
			} else {
				$groupAct = DB::table('group_activity')->where('group_id', $group->id)->where('activity_id', $id);
				if($groupAct->count() < 1){
					$group->status = 'Belum Input';
				} else {
					$score = DB::table('scores')->where('jury_id', Session::get('theUser')->id)
										 ->where('group_activity_id', $groupAct->first()->id);
					if($score->count() < 1){
						$group->status = 'Belum Dinilai';
					} else {
						$group->status = 'Sudah Dinilai';
						$group->score = $score->first()->score;
					}
				}
			}
		}		

		$this->data['groups'] = $groups;

		$this->layout->content = View::make('list_act_contest', $this->data);
	}

}