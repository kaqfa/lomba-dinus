<?php

use Illuminate\Database\Migrations\Migration;

class CreateGroupMember extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_member', function($table){
			$table->increments('id');
			$table->integer('participant_id')->unsigned();
			$table->integer('group_id')->unsigned();
			$table->smallInteger('role');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_member');
	}

}