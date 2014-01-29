<?php

class Message extends Eloquent {
	protected $table = 'messages';

	public function User(){
		return $this->belongsTo('User', 'from', 'id');
	}
}