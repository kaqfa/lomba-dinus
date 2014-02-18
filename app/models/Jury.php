<?php

class Jury extends Eloquent {

	protected $table = 'juries';
	public $timestamps = true;
	protected $softDelete = false;	
	protected $fillable = array('user_id', 'contest_id');

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function scoring(){
		return $this->belongsToMany('group_activity', 'scores', 'jury_id', 'group_activity_id');
	}

}