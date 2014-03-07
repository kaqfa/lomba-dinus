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
	
	public function index($testId, $num = 0){
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

		$questId = DB::table('group_answer')
									->where('question_id', $num)
									->where('group_id', $this->group)
									->first();

		$this->data['numQuest'] = $num;		
		if($num > 0){
			$this->data['answer'] = $this->options[$questId->answer];
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
			return "Belum dijawab";
		}
		
		//
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
										'group_id'=>$this->group, 'test_id'=>$testId) );
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
				'activity_id'=>$activityId, 'file'=>'-', 'file_type'=>'0'));
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