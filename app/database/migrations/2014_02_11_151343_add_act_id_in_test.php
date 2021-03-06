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
			$tb->integer('activity_id')->unsigned()->after('description');
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