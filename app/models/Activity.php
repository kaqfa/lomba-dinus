<?php

class Activity extends Eloquent {

	protected $table = 'activities';
	public $timestamps = true;
	protected $softDelete = false;

	public function contest(){
		return $this->belongsTo('Contest');
	}

	public function groupActivity(){
		return $this->belongsToMany('Group', 'group_activity');
	}
	
}