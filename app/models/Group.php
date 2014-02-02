<?php

class Group extends Eloquent {

	protected $table = 'groups';
	public $timestamps = true;
	protected $softDelete = false;

	public function groupActivity()
	{
		return $this->belongsToMany('Activity');
	}

}