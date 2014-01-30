<?php

class ContestController extends \BaseController {

	protected $layout = 'layouts.adminbase';
	protected $data = array();

	public function __construct(){
		View::share('contestMenu', Activity::get(array('id','name')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$activity = Activity::find($id);

		$this->data['act'] = array('name'=>$activity->name, 'type' => '2'); // $activity->type
		
		if($activity->type != '3'){
			$this->layout->content = View::make('form_act_contest', $this->data);
		} else {
			$this->layout = 'layout.testbase';
			$this->layout->content = View::make('test_start', $this->data);
		}
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