<?php

use Illuminate\Database\Migrations\Migration;

class AddActIdInTest extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tests', function($tb){
			$tb->string('activity_id', '20')->after('description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tests', function($tb){
			$tb->dropColumn('activity_id');
		});
	}

}