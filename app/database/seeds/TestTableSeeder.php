<?php

class TestTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('tests')->delete();

		// penyisihan kemanan
		Test::create(array(
				'name' => "Penyisihan Keamanan Jaringan",
				'description' => "Babak penyisihan keamanan jaringan",
				'date_from' => "2014/02/14",
				'date_until' => "2014/02/20",
				'minutes' => 90
			));
	}
}