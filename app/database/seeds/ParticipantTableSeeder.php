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

		Participant::create(array(
				'nim'=>'A345678',
				'name'=>'Peserta Kedua',
				'email'=>'peserta2@gmail.com',
				'contact'=>'08989987517',
				'ktm_file'=>'kartu.jpg',
				'user_id'=>'6',
				'created_by'=>'1'
			));

		Participant::create(array(
				'nim'=>'A456789',
				'name'=>'Peserta Sembarang',
				'email'=>'sembarang@gmail.com',
				'contact'=>'08989987517',
				'ktm_file'=>'kartu.jpg',				
				'created_by'=>'1'
			));

		Participant::create(array(
				'nim'=>'A567890',
				'name'=>'Peserta Ikutan',
				'email'=>'ikutan@gmail.com',
				'contact'=>'08989987517',
				'ktm_file'=>'kartu.jpg',
				'created_by'=>'1'
			));

		Participant::create(array(
				'nim'=>'A678901',
				'name'=>'Peserta Ketiga',
				'email'=>'peserta3@gmail.com',
				'contact'=>'08989987517',
				'ktm_file'=>'kartu.jpg',
				'user_id'=>'7',
				'created_by'=>'1'
			));

		Participant::create(array(
				'nim'=>'A789012',
				'name'=>'Peserta Tambahan',
				'email'=>'tambahan@gmail.com',
				'contact'=>'08989987517',
				'ktm_file'=>'kartu.jpg',				
				'created_by'=>'1'
			));

		Participant::create(array(
				'nim'=>'A8901234',
				'name'=>'Peserta Akhiran',
				'email'=>'terakhir@gmail.com',
				'contact'=>'08989987517',
				'ktm_file'=>'kartu.jpg',
				'created_by'=>'1'
			));

	}
}