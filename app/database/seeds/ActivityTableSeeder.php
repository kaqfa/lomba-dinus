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

		Activity::create(array(
				'name' => "Deskripsi Permainan Edukatif",
				'description' => "Mengupload deskripsi permainan inovatif, sesuai dengan ketentuan yang ada",
				'date_from' => "2014/02/02",
				'date_until' => "2014/03/07",
				'type' => "2",
				'contest_id' => 2
			));

		Activity::create(array(
				'name' => "Tes Keamanan Jaringan",
				'description' => "Melakukan tes online untuk keamanan jaringan, dengan soal yang telah dibuat oleh juri",
				'date_from' => "2014/03/02",
				'date_until' => "2014/03/07",
				'type' => "3",
				'contest_id' => 3
			));

		Activity::create(array(
				'name' => "Upload Aplikasi Inovatif",
				'description' => "Mengupload file aplikasi inovatif atau submit alamat web aplikasi berbasis web",
				'date_from' => "2014/02/17",
				'date_until' => "2014/03/11",
				'type' => "2",
				'contest_id' => 1
			));

		Activity::create(array(
				'name' => "Upload Permainan Edukatif",
				'description' => "Mengupload file aplikasi permainan edukatif atau submit alamat web aplikasi berbasis web",
				'date_from' => "2014/02/17",
				'date_until' => "2014/03/11",
				'type' => "2",
				'contest_id' => 2
			));

		Activity::create(array(
				'name' => "Upload Bugs Online App",
				'description' => "Mengupload dokumen bug dari online application yang diberikan",
				'date_from' => "2014/03/10",
				'date_until' => "2014/03/16",
				'type' => "2",
				'contest_id' => 3
			));

		Activity::create(array(
				'name' => "Upload Source Code Aplikasi",
				'description' => "Mengupload source code sumber aplikasi inovatif beserta dependensinya",
				'date_from' => "2014/03/15",
				'date_until' => "2014/03/18",
				'type' => "2",
				'contest_id' => 1
			));

		Activity::create(array(
				'name' => "Upload Source Code Permainan",
				'description' => "Mengupload source code sumber permainan edukatif beserta dependensinya",
				'date_from' => "2014/03/15",
				'date_until' => "2014/03/18",
				'type' => "2",
				'contest_id' => 2
			));

	}
}