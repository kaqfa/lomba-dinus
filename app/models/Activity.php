<?php

class Activity extends Eloquent {
	protected $table = "activities";

	public function Group(){
		return $this->belongsToMany('Group', 'group_activities');
	}
}