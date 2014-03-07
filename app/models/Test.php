<?php

class Test extends Eloquent {

	protected $table = 'tests';
	public $timestamps = true;
	protected $softDelete = false;

	public function question()
	{
		return $this->hasMany('Question');
	}

	public function activity(){
		return $this->belongsTo('Activity');
	}

}