<?php

class User extends Eloquent {

	protected $table = 'Users';
	public $timestamps = true;
	protected $softDelete = false;

	public function participant()
	{
		return $this->hasOne('Participant');
	}

	public function createPar()
	{
		return $this->hasMany('Participant', 'created_by');
	}

	public function message()
	{
		return $this->hasMany('Message', 'from');
	}

}