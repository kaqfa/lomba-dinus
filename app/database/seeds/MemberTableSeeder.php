<?php

class MemberTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('group_member')->delete();

		DB::table('group_member')->insert( array(
				array('participant_id'=>'1','group_id'=>'1','role'=>'1'),
				array('participant_id'=>'2','group_id'=>'1','role'=>'2')
			));
	}
}