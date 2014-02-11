<?php

class ParticipantTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('participants')->delete();

		Participant::create(array(
				'nim'=>'A123456',
				'name'=>'Peserta Pertama',
				'email'=>'peserta1@gmail.com',
				'contact'=>'08989987517',
				'ktm_file'=>'kartu.jpg',
				'user_id'=>'5',
				'created_by'=>'1'
			));

		Participant::create(array(
				'nim'=>'A23456',
				'name'=>'Peserta Lainnya',
				'email'=>'pesertalain@gmail.com',
				'contact'=>'08989987517',
				'ktm_file'=>'kartu2.jpg',				
				'created_by'=>'1'
			));

	}
}