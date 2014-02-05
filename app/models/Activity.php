<?php

class Activity extends Eloquent {

	protected $table = 'activities';
	public $timestamps = true;
	protected $softDelete = false;

	public function contest(){
		return $this->belongsTo('Contest');
	}
}