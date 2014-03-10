<?php
class ContestController extends \BaseController {

	protected $layout = 'test.testbase';
	protected $data = array();
	protected $group;
	protected $options = array();

	public function __construct(){	
		$this->group = Session::get('theGroups')[0];
		$this->options = array('<span style="color:red">Belum dijawab</span>', 
											'<span style="color:green">A</span>', 
											'<span style="color:green">B</span>', 
											'<span style="color:green">C</span>', 
											'<span style="color:green">D</span>', 
											'<span style="color:green">E</span>');
	}

	private function getQuestions($testId){
		$quests = DB::table('group_answer')->select('id', 'question_id', 'group_id', 'test_id')
									->where('group_id', $this->group)
									->where('test_id', $testId)->get();

		return $quests;
	}	

	private function timeLeft(){
			$test = Test::find(Request::segment(3));
			$start = DB::table('group_activity')
										->where('group_id', Session::get('theGroups')[0])
										->where('activity_id', $test->activity_id)
										->first(array('created_at'));

			$differ = ($test->minutes*60) - (time() - strtotime($start->created_at));

			return $differ;
	}

	public function review($testId){
		$this->data['answers'] = DB::table('group_answer')
														->where('group_id', Session::get('theGroups')[0])
														->where('test_id', $testId)->get();
		$this->data['options'] = $this->options;
		$quests = $this->getQuestions($testId);
		View::share('leftMenu', $quests);
		View::share('timeLeft', $this->timeLeft());
		View::share('test', Test::find($testId));

		$this->layout->content =  View::make('test.review', $this->data);
	}
	
	public function index($testId, $num = 0){
		if($this->timeLeft() < 1) {
			return Redirect::to('/admin/contest-act/'.Test::find($testId)->activity_id);
		}

		if( in_array($testId, Session::get('theTest')) ){
			$groupAct = DB::table('group_activity')
								->where('group_id', Session::get('theGroups')[0])
								->where('activity_id', Test::find($testId)->activity_id)
								->count();

			if($groupAct < 1)
				return Redirect::to('/admin/contest-act/'.Test::find($testId)->activity_id);
		} else {
			return Redirect::to('/admin')->with('message','Anda tidak memiliki test tersebut');
		}

		$quests = $this->getQuestions($testId);
		View::share('leftMenu', $quests);
		View::share('timeLeft', $this->timeLeft());
		View::share('test', Test::find($testId));

		$questId = DB::table('group_answer')
									->where('question_id', $num)
									->where('group_id', $this->group)
									->first();
		
		$this->data['numQuest'] = $num;
		$this->data['options'] = $this->options;		
		if($num > 0){
			$this->data['answer'] = $questId->answer;
			$this->data['quest'] = Question::find($num);
		} else {
			$questId = DB::table('group_answer')
									->where('test_id', $testId)
									->where('group_id', $this->group)
									->first();
			return Redirect::to('/admin/test/'.$testId.'/'.$questId->question_id);
		}
		$this->layout->content =  View::make('test.test', $this->data);
	}

	public function updateAnswer(){
		$this->layout = null;
		$cond = DB::table('group_answer')->where('question_id', Input::get('question_id'))
				->where('group_id', Session::get('theGroups')[0])->where('test_id', Input::get('test_id'));

		if($cond->count() > 0){
			$cond->update(array('answer'=>Input::get('answer')));			
			return $this->options[$cond->first(array('answer'))->answer];
		} else {
			//print_r(DB::getQueryLog());
			return $this->options[0];
		}
	}

	private function generateQuestions($testId){
		$groupQuest = DB::table('group_answer')->where('group_id', $this->group)
											->where('test_id', $testId);

		if($groupQuest->count() < 1){
			$quests = Question::where('test_id', $testId)
												->take(Config::get('contest.question-num'))
												->orderBy(DB::raw('RAND()'))
												->get(array('id'));
			foreach ($quests as $data) {
					DB::table('group_answer')
					->insert( array('question_id'=>$data->id, 'answer'=>0,
										'group_id'=>$this->group, 'test_id'=>$testId, 
										'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')) );
			}
		}

		$activityId = Test::find($testId)->activity_id;
		$activity = Activity::find($activityId);

		$groupAct = DB::table('group_activity')
								->where('group_id', $this->group)
								->where('activity_id', $activityId)
								->count();

		if($groupAct < 1)
			DB::table('group_activity')->insert(array('group_id'=>$this->group, 
				'activity'=>$activity->name, 'description'=>'The test is now started', 
				'activity_id'=>$activityId, 'file'=>'-', 'file_type'=>'0', 
				'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=>date('Y-m-d H:i:s')));
	}

	public function startTest($testId){
		
		if( in_array($testId, Session::get('theTest')) ){
			$test = Test::find($testId);
		} else {
			return Redirect::to('/admin')->with('message','Anda tidak memiliki test tersebut');
		}

		if( (strtotime($test->date_from) > time()) && (strtotime($test->date_until) < time()) ){
			return Redirect::to('/admin/contest-act/'.Test::find($testId)->activity_id)
							->with('message', 'Waktu Habis');
		}

		$this->generateQuestions($testId);		

		return Redirect::to('/admin/test/'.$testId);
	}

}