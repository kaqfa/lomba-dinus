<?php

class MemberTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('group_member')->delete();

		DB::table('group_member')->insert( array(
				array('participant_id'=>'1','group_id'=>'1','role'=>'1'),
				array('participant_id'=>'2','group_id'=>'1','role'=>'2')
			));

		DB::table('group_member')->insert( array(
				array('participant_id'=>'3','group_id'=>'2','role'=>'1'),
				array('participant_id'=>'4','group_id'=>'2','role'=>'2'),
				array('participant_id'=>'5','group_id'=>'2','role'=>'2')
			));

		DB::table('group_member')->insert( array(
				array('participant_id'=>'6','group_id'=>'3','role'=>'1'),
				array('participant_id'=>'7','group_id'=>'3','role'=>'2'),
				array('participant_id'=>'8','group_id'=>'3','role'=>'2')
			));
	}
}