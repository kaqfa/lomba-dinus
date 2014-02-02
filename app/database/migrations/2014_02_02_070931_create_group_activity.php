<?php

use Illuminate\Database\Migrations\Migration;

class CreateGroupActivity extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_activity', function($table){
			$table->increments('id');
			$table->integer('group_id')->unsigned();
			$table->string('activity', 200);
			$table->text('description')->nullable();
			$table->string('file', 200)->nullable();
			$table->string('file_type', 200)->nullable();
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
		Schema::drop('group_activity');
	}

}