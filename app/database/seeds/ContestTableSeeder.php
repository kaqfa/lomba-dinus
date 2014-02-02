<?php

class ContestTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('contests')->delete();

		// aplikasi inovatif
		Contest::create(array(
				'name' => "Aplikasi Inovatif",
				'description' => "Lomba membuat perangkat lunak yang inovatif"
			));

		// permainan edukatif
		Contest::create(array(
				'name' => "Permainan Edukatif",
				'description' => "Lomba membuat permainan yang edukatif dan bermanfaat"
			));

		// keamanan jaringan
		Contest::create(array(
				'name' => "Keamanan Jaringan",
				'description' => "Lomba Mengamankan jaringan dan mencari celah keamanan"
			));
	}
}