<?php

class JuryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('juries')->truncate();

		Jury::create(array(
				'user_id'=>'2',
				'contest_id'=>'1'
			));

		Jury::create(array(
				'user_id'=>'3',
				'contest_id'=>'2'
			));

		Jury::create(array(
				'user_id'=>'4',
				'contest_id'=>'3'
			));
	}
	
}