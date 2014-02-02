<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('Users')->delete();

		// supergod admin
		User::create(array(
				'username' => 'supergod',
				'password' => Hash::make('12345'),
				'name' => 'Super God Admin',
				'email' => 'elfaatt@gmail.com',
				'contact' => '08989987517',
				'level' => 1,
				'status' => 1
			));
	}
}