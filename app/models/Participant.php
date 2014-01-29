<?php

class Participant extends Eloquent {
	protected $table = "participants";

	public function Group(){
		return $this->belongsTo('Group');
	}

	public function User(){
		return $this->belongsTo('User');
	}
}