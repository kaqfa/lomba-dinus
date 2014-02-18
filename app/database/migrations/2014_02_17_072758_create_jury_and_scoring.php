<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuryAndScoring extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('juries', function($tb){
			$tb->increments('id');
			$tb->integer('user_id')->unsigned();
			$tb->integer('contest_id')->unsigned();
			$tb->timestamps();
		});

		Schema::create('scores', function($tb){
			$tb->increments('id');
			$tb->integer('jury_id')->unsigned();
			$tb->integer('group_activity_id')->unsigned();
			$tb->integer('score');
			$tb->smallInteger('pecentage');
			$tb->text('annotation');
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
		Schema::drop('juries');
		Schema::drop('scores');
	}

}
