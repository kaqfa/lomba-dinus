<?php

class Participant extends Eloquent {

	protected $table = 'participants';
	public $timestamps = true;
	protected $softDelete = false;
	protected $fillable = array('nim', 'name', 'email', 'contact', 'created_by');

	public function groupMember()
	{
		return $this->belongsToMany('Group', 'group_member');
	}

	public function user(){
		return $this->belongTo('User');
	}

}