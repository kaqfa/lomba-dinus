<?php

class GroupTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('groups')->delete();

		Group::create(array(
				'name'=>'Group Aplikasi Ino',
				'advisor'=>'Fahri Firdausillah, MCS',
				'contact'=>'08989987517',
				'contest_id'=>'1'
			));

		Group::create(array(
				'name'=>'Group Game Loh',
				'advisor'=>'Fahri Firdausillah, MCS',
				'contact'=>'08989987517',
				'contest_id'=>'2'
			));

		Group::create(array(
				'name'=>'Group Jaring',
				'advisor'=>'Fahri Firdausillah, MCS',
				'contact'=>'08989987517',
				'contest_id'=>'3'
			));
	}
}