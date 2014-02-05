<?php

class ActivityTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('activities')->delete();

		// deskripsi aplikasi
		Activity::create(array(
				'name' => "Deskripsi Aplikasi Inovatif",
				'description' => "Mengupload deskripsi aplikasi inovatif, sesuai dengan ketentuan yang ada",
				'date_from' => "2014/02/02",
				'date_until' => "2014/02/28",
				'type' => "2",
				'contest_id' => 1
			));
	}
}