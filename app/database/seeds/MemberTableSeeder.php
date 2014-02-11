<?php

class MemberTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('group_member')->delete();

		DB::insert('insert into group_member values (null, ?, ?, ?, ?, ?)');
	}
}