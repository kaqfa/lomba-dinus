<?php

class GroupTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('groups')->delete();

		Group::create(array(
				'name'=>'Group Sesukanya',
				'advisor'=>'Fahri Firdausillah, MCS',
				'contact'=>'08989987517',
				'contest_id'=>'1'
			));
	}
}