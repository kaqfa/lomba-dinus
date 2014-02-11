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
		$user->password	= Hash::make(Input::get('passwd'));
		$user->name 	= Input::get('name');
		$user->email	= Input::get('email');
		$user->contact 	= Input::get('contact');
		$user->level 	= Input::get('level');
		$user->status 	= 1;

		$user->save();		

		if(Input::get('level') == '3'){
			//print_r($user);
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

	public function insertQuestion(){
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

	public function insertContest(){

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

	public function insertMessage(){

	}
}