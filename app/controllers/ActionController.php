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

	public function userLogin(){
		if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))){
		    $user = User::where('username','=',Input::get('username'))->first();

		    Session::put('theUser', $user);
		    if($user->level == 3){
		    	$part = Participant::where('user_id', $user->id)->first(array('nim', 'id'));
			    Session::put('theParticipant', $part);

			    $groups = DB::table('group_member')->where('participant_id', $part->id)->get(array('group_id'));
			    $theGroups = array();
			    foreach ($groups as $group) 
			    	$theGroups[] = $group->group_id;			    
			    Session::put('theGroups', $theGroups);

			    $contest = Contest::whereIn('id', $theGroups)->get(array('id', 'name'));
			    Session::put('theContest', $contest);
		    }

		    return Redirect::to('admin');
		} else {
			return Redirect::to('/')->with('message', 'Username atau Password tidak tepat, silahkan coba lagi');
		}
	}

	public function logout() {
	   Auth::logout();
	   $theUser = Session::get('theUser');
	   $user = User::find($theUser->id);
	   $user->last_login = date("Y-m-d H:i:s");
	   $user->save();	   
	   Session::flush();

	   return Redirect::to('/')->with('message', 'Anda sudah Log Out!');
	}

	public function insertUser(){
		$user = null;

		if(Input::has('id')){
			$user = User::find(Input::get('id'));
		} else {
			$user = new User;
		}

		$user->username = Input::get('username');
		if(Input::get('passwd') != '')
			$user->password	= Hash::make(Input::get('passwd'));
		$user->name 	= Input::get('name');
		$user->email	= Input::get('email');
		$user->contact 	= Input::get('contact');
		if(Input::has('level'))
			$user->level 	= Input::get('level');

		$user->status 	= 1;

		$user->save();		

		if(Input::get('level') == '2'){
			$jury = null;

			if(Input::has('id')){
				$jury = Jury::where('user_id', Input::get('id'))->first();
			} else {
				$jury = new Jury;
			}

			$jury->user_id = Input::get('id');
			$jury->contest_id = Input::get('contest_id');

			$jury->save();
		} else if(Input::get('level') == '3'){			
			$par = null;

			if(Input::has('id')){
				$par = Participant::where('user_id', Input::get('id'))->first();
			} else {
				$par = new Participant;
			}

			$par->name = Input::get('name');
			$par->email = Input::get('email');
			$par->contact = Input::get('contact');
			$par->created_by = Session::get('theUser')->id;
			$par->user_id = $user->id;

			$par->save();
		}

		return Redirect::to('admin/list-user');
	}

	public function delUser($id){ 
		User::find($id)->delete(); 
		return Redirect::to('admin/list-user')->with('message', 'Data pengguna berhasil dihapus'); 
	}

	public function insertActivity(){
		$act = null;

		if(Input::has('id')){
			$act = Activity::find(Input::get('id'));
		} else {
			$act = new Activity;
		}

		$act->name = Input::get('name');
		$act->description = Input::get('description');
		$act->contest_id = Input::get('contest_id');
		$act->date_from = Input::get('date_from');
		$act->date_until = Input::get('date_until');
		$act->type = Input::get('type');

		$act->save();

		if(Input::get('type') == 3){
			if(Input::has('id')){
				$test = Test::where('activity_id', Input::get('id'));
			} else {
				$test = new Test;
			}
			$test->name = Input::get('name');
			$test->description = Input::get('description');
			$test->activity_id = $act->id;
			$test->date_from = Input::get('date_from');
			$test->date_until = Input::get('date_until');
			$test->minutes = 90;

			$test->save();
		}

		return Redirect::to('admin/list-activity');
	}

	public function delActivity($id){ 
		Activity::find($id)->delete(); 
		return Redirect::to('admin/list-activity')->with('message', 'Data aktifitas berhasil dihapus'); 
	}

	public function saveQuestion(){
		$quest = null;
		if(Input::has('id'))
			$quest = Question::find(Input::get('id'));
		else
			$quest = new Question;		
		$inp = Input::all();

		$quest->question = $inp['question'];
		$quest->optA = $inp['optA'];
		$quest->optB = $inp['optB'];
		$quest->optC = $inp['optC'];
		$quest->optD = $inp['optD'];
		$quest->optE = $inp['optE'];
		$quest->answer = $inp['answer'];
		$quest->type = 1;
		$quest->test_id = $inp['test_id'];

		$quest->save();

		return Redirect::to('admin/list-question/'.$inp['test_id']);
	}

	public function saveContest(){
		$contest = null;

		if(Input::has('id')){
			$contest = Contest::find(Input::get('id'));
		} else {
			$contest = new Contest;
		}

		$contest->name = Input::get('name');
		$contest->description = Input::get('description');

		$contest->save();

		return Redirect::to('admin/list-contest')->with('message', 'Kategori baru telah dibuat');
	}

	public function delContest($id){ 
		$contest = Contest::find($id); 
		if($contest != null){
			$contest->delete();
			return Redirect::to('admin/list-contest')
							->with('message', 'Data kategori lomba berhasil dihapus'); 
		} else {
			return Redirect::to('admin/list-contest')
							->with('error', 'Data kategori tidak ditemukan'); 
		}

	}

	public function saveTest(){
		$test = null;
		if(Input::has('id'))
			$test = Test::find(Input::get('id'));
		else
			$test = new Test;

		$test->name = Input::get('name');
		$test->description = Input::get('description');
		// $test->activity_id = Input::get('activity_id');
		$test->date_from = Input::get('date_from');
		$test->date_until = Input::get('date_until');
		$test->minutes = Input::get('minutes');

		$test->save();

		return Redirect::to('admin/list-test')->with('message','Test berhasil dibuat');
	}

	public function delTest($id){
		Test::find($id)->delete();

		return Redirect::to('admin/list-test')->with('message', 'Test berhasil dihapus');
	}

	public function insertGroup(){
		$theUser = Session::get('theUser');

		$group = new Group;
		//$inp = Input::all();

		$group->name = Input::get('name');
		$group->advisor = Input::get('advisor');
		$group->contact = Input::get('contact');
		$group->contest_id = Input::get('contest_id');
		$group->save();

		$member1 = Participant::find(Input::get('participant_id1'));
		$member1->nim = Input::get('nim1');
		$member1->save();
		
		//$member1->groupMember()->get(); // attach($groupSave->id, array('role', '1'))
		DB::insert('insert into group_member values (null, ?, ?, ?, ?, ?)', 
					array($member1->id, $group->id, '1', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')) );

		if(Input::has('check2')){
			$member2 = Participant::create( array('nim'=>Input::get('nim2'), 'name'=>Input::get('name2'), 
						'email'=>Input::get('email2'), 'contact'=>'-', 'created_by'=>$theUser->id) );
			//$member2->groupMember()->attach($groupSave->id, array('role', '2'));
			DB::insert('insert into group_member values (null, ?, ?, ?, ?, ?)', 
					array($member2->id, $group->id, '2', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')) );
		}

		if(Input::has('check3')){
			$member3 = Participant::create( array('nim'=>Input::get('nim3'), 'name'=>Input::get('name3'), 
						'email'=>Input::get('email3'), 'contact'=>'-', 'created_by'=>$theUser->id) );
			//$member3->groupMember()->attach($groupSave->id, array('role', '2'));
			DB::insert('insert into group_member values (null, ?, ?, ?, ?, ?)', 
					array($member3->id, $group->id, '2', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')) );
		}
		//print_r(DB::getQueryLog());
		return Redirect::to('admin/list-participant')->with('message', 'Berhasil Membuatnya');
	}

	public function editGroup(){
		$theUser = Session::get('theUser');

		$group = Group::find(Input::get('groupId'));

		$group->name = Input::get('name');
		$group->advisor = Input::get('advisor');
		$group->contact = Input::get('contact');
		$group->contest_id = Input::get('contest_id');
		$group->save();		

		$members = $group->groupMember()->get(array('participants.id'));

		$i = 1;
		foreach ($members as $data) {
			$member = Participant::find($data->id);
			$member->nim = Input::get('nim'.$i);
			$member->name = Input::get('name'.$i);
			$member->email = Input::get('email'.$i);
			$member->save();
			$i++;
		}		
		
		// jika ada penambahan member
		if(Input::has('check2') && $members->count() < 2){
			$member2 = Participant::create( array('nim'=>Input::get('nim2'), 'name'=>Input::get('name2'), 
						'email'=>Input::get('email2'), 'contact'=>'-', 'created_by'=>$theUser->id) );			
			DB::insert('insert into group_member values (null, ?, ?, ?, ?, ?)', 
					array($member2->id, $group->id, '2', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')) );
		}
		if(Input::has('check3') && $members->count() < 3){
			$member3 = Participant::create( array('nim'=>Input::get('nim3'), 'name'=>Input::get('name3'), 
						'email'=>Input::get('email3'), 'contact'=>'-', 'created_by'=>$theUser->id) );
			DB::insert('insert into group_member values (null, ?, ?, ?, ?, ?)', 
					array($member3->id, $group->id, '2', date('Y-m-d H:i:s'), date('Y-m-d H:i:s')) );
		}
		
		return Redirect::to('admin/list-group')->with('message', 'Group');
	}

	public function actContest(){		
		$input['activity'] = Input::get('activity');
		$input['description'] = Input::get('description');		
		$input['file_type'] = Input::get('file_type');

		if(Input::hasFile('file')){
			$filename = 'Group-'.Session::get('theGroups')[0].'-'.Input::get('activity').
									'.'.Input::file('file')->getClientOriginalExtension();
			$success = Input::file('file')->move(public_path().'/uploads/group_act', $filename);
			if($success)
				$input['file'] = $filename;
		}

		DB::table('group_activity')
					->where('group_id', Session::get('theGroups')[0])
					->where('activity_id', Input::get('activity_id'))
					->update($input);

		return Redirect::to('admin/contest-act/'.Input::get('activity_id'))
						->with('message', 'Data berhasil diunggah dan bisa');
	}

	public function insertMessage(){

	}
}