<?php

class Contest extends Eloquent {

	protected $table = 'contests';
	public $timestamps = true;
	protected $softDelete = false;
	public $aVar = "this is the Var";

	public function group()
	{
		return $this->hasMany('Group');
	}

	public function activity()
	{
		return $this->hasMany('Activity');
	}

}