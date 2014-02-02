<?php

use Illuminate\Database\Migrations\Migration;

class CreateGroupAnswer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_answer', function($tb){
			$tb->increments('id');
			$tb->integer('question_id')->unsigned();
			$tb->integer('group_id')->unsigned();
			$tb->smallInteger('answer');			
			$tb->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_answer');
	}

}