<?php

use Illuminate\Database\Migrations\Migration;

class AddContactParticipant extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('participants', function($tb){
			$tb->string('contact', '20')->after('email')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('participants', function($tb){
			$tb->dropColumn('contact');
		});
	}

}