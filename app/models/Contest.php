<?php

class Contest extends Eloquent {
	protected $table = "Contests";

	public function GroupContest(){
		return $this->hasMany("GroupContest");
	}
}