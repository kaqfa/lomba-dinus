<?php

class Question extends Eloquent {

	protected $table = 'questions';
	public $timestamps = true;
	protected $softDelete = false;

	public function groupAnswer()
	{
		return $this->belongsToMany('Group');
	}

}