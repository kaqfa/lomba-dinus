<?php

class Group extends Eloquent {

	protected $table = 'groups';
	public $timestamps = true;
	protected $softDelete = false;
	protected $fillable = array('name', 'advisor', 'contact', 'contest_id');

	public function groupActivity()
	{
		return $this->belongsToMany('Activity');
	}

	public function groupMember()
	{
		return $this->belongsToMany('Participant', 'group_member');
	}

}