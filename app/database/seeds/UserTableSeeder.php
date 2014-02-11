<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('Users')->delete();

		// supergod admin
		User::create(array(
				'username' => 'superadmin',
				'password' => Hash::make('123'),
				'name' => 'Super Admin',
				'email' => 'elfaatta@gmail.com',
				'contact' => '08989987517',
				'level' => 1,
				'status' => 1
			));

		User::create(array(
				'username' => 'juri1',
				'password' => Hash::make('123'),
				'name' => 'Juri Aplikasi Inovatif',
				'email' => 'juri1@gmail.com',
				'contact' => '08989987517',
				'level' => 2,
				'status' => 1
			));

		User::create(array(
				'username' => 'juri2',
				'password' => Hash::make('123'),
				'name' => 'Juri Permainan Edukatif',
				'email' => 'juri2@gmail.com',
				'contact' => '08989987517',
				'level' => 2,
				'status' => 1
			));

		User::create(array(
				'username' => 'juri3',
				'password' => Hash::make('123'),
				'name' => 'Juri Jaringan',
				'email' => 'juri3@gmail.com',
				'contact' => '08989987517',
				'level' => 2,
				'status' => 1
			));

		User::create(array(
				'username' => 'peserta1',
				'password' => Hash::make('123'),
				'name' => 'Peserta Pertama',
				'email' => 'peserta1@gmail.com',
				'contact' => '08989987517',
				'level' => 3,
				'status' => 1
			));

		User::create(array(
				'username' => 'peserta2',
				'password' => Hash::make('123'),
				'name' => 'Peserta Kedua',
				'email' => 'peserta2@gmail.com',
				'contact' => '08989987517',
				'level' => 3,
				'status' => 1
			));
	}
}