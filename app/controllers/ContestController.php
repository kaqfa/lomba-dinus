<?php

class ContestController extends \BaseController {

	protected $layout = 'test.testbase';
	protected $data = array();
	protected $group;

	public function __construct(){	
		$this->group = Session::get('theGroups')[0];
	}

	private function getQuestions($testId){
		$quests = DB::table('group_answer')->select('id', 'question_id', 'group_id', 'test_id')
									->where('group_id', $this->group)
									->where('test_id', $testId)->get();

		return $quests;
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
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($testId, $num = 0)
	{
		$quests = $this->getQuestions($testId);
		View::share('leftMenu', $quests);

		$questId = DB::table('group_answer')
						->where('test_id', $testId)
						->where('group_id', $this->group)
						->first(array('question_id'));

		$this->data['numQuest'] = $num;		
		if(count($questId) > 0){
			$this->data['quest'] = Question::find($num);
		} else {
			return Redirect::to('/admin/test/'.$testId.'/'.$questId->question_id);
		}
		$this->layout->content =  View::make('test.test', $this->data);
	}

	public function startTest($activityId){
		$activity = Activity::find($activityId);
		$groupAct = DB::table('group_activity')
						->where('group_id',Session::get('theGroups')[0])
						->where('activity_id',$id);

		if( (strtotime($activity->date_from) > time()) || (strtotime($activity->date_until) < time()) ){
			return Redirect::to('/admin/contest-act/'.$activityId);
		}

		$this->generateQuestions($testId);
		if($groupAct < 1)
			DB::table('group_activity')->insert(array('group_id'=>$this->group, 
				'activity'=>$activity->name, 'description'=>'The test is now started', 
				'activity_id'=>$activityId, 'file'=>'-', 'file_type'=>'0'));

		return Redirect::to('/admin/test/'.$activityId);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}