<?php

class Group extends Eloquent {
	protected $table = "groups";

	public function Activity(){
		return $this->belongsToMany('Activity', 'group_activities');
	}

	public function Contest(){
		return $this->belongsTo('Contest');
	}

	public function Participant(){
		return $this->belongsToMany('Participant', 'group_members');
	}
}