<?php

class ParticipantTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('participants')->delete();

		Participant::create(array(
				'nim'=>'',
				'name'=>'',
				'email'=>'',
				'contact'=>'',
				'ktm_file'=>'',
				'user_id'=>'',
				'created_by'=>'',
				'created_at'=>'',
				'updated_at'=>''
			));
	}
}