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
	   Session::destroy();

	   return Redirect::to('/')->with('message', 'Anda sudah Log Out!');
	}

	public function insertUser(){
		$user = new User;

		$user->username = Input::get('username');
		$user->password	= Hash::make(Input::get('passwd'));
		$user->name 	= Input::get('name');
		$user->email	= Input::get('email');
		$user->contact 	= Input::get('contact');
		$user->level 	= Input::get('level');
		$user->status 	= 1;

		$user->save();

		if(Input::get('level') == '3'){
			$par = new Participant;

			$par->name = Input::get('name');
			$par->email = Input::get('email');
			$par->contact = Input::get('contact');
			$par->created_by = Session::get('theUser')->id;

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
		$inp = Input::all();

		$group->name = $inp['name'];
		$group->advisor = $inp['advisor'];
		$group->contact = $inp['contact'];
		$group->contest_id = $inp['contest_id'];
		$groupSave = $group->save();

		$member1 = Participant::find($inp['participant_id1']);
		$member1->groupMember()->attach($groupSave->id, array('role', '1'));

		if(Input::has('check2'))){
			$member2 = Participant::create( array('nim'=>$inp->nim2, 'name'=>$inp->name2, 
						'email'=>$inp->email2, 'contact'=>'-', 'created_by'=>$theUser->id) );
			$member2->groupMember()->attach($groupSave->id, array('role', '2'));
		}

		if(Input::has('check3')){
			$member3 = Participant::create( array('nim'=>$inp->nim3, 'name'=>$inp->name3, 
						'email'=>$inp->email3, 'contact'=>'-', 'created_by'=>$theUser->id) );
			$member3->groupMember()->attach($groupSave->id, array('role', '2'));
		}

		return Redirect::to('admin/list-question/'.$inp['test_id'])->with('message', 'Berhasil Membuatnya');
	}

	public function insertMessage(){

	}
}