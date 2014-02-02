<?php

class Participant extends Eloquent {

	protected $table = 'participants';
	public $timestamps = true;
	protected $softDelete = false;

	public function groupMember()
	{
		return $this->belongsToMany('Group');
	}

}