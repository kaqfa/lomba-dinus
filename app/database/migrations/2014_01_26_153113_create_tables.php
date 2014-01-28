<?php

use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * create all neccessary tables.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('username', 40);
			$table->string('passwd', 40);
			$table->smallInteger('level');
			$table->timestamp('last_login');
			$table->smallInteger('status');
			$table->timestamps();
		});
		
		Schema::create('participants', function($table){
			$table->increments('id');
			$table->integer('users_id')->unsigned()->nullable();
			$table->string('nim', 15);
			$table->string('name', 40);
			$table->string('email', 200);
			$table->string('ktm_file', 200)->nullable();
			$table->integer('created_by')->unsigned();
			$table->timestamps();
		});
		
		Schema::create('contests', function($table){
			$table->increments('id');
			$table->string('name', 100);
			$table->text('description')->nullable();
			$table->timestamps();
		});
		
		Schema::create('group_members', function($table){
			$table->increments('id');
			$table->integer('participants_id')->unsigned();
			$table->integer('group_contest_id')->unsigned();
			$table->smallInteger('role');
			$table->timestamps();
		});
		
		Schema::create('group_contest', function($table){
			$table->increments('id');
			$table->integer('contest_id')->unsigned();
			$table->string('name', 100);
			$table->string('advisor', 100);
			$table->string('contact', 22)->nullable();
			$table->timestamps();
		});
		
		Schema::create('group_activites', function($table){
			$table->increments('id');
			$table->integer('group_contest_id')->unsigned();
			$table->string('activity', 200);
			$table->text('description')->nullable();
			$table->string('file', 200)->nullable();
			$table->string('file_type', 200)->nullable();
			$table->timestamps();
		});
		
		Schema::create('messages', function($table){
			$table->increments('id');
			$table->integer('from')->unsigned();
			$table->string('to', 100);
			$table->string('tittle', 200);
			$table->text('content');
			$table->date('last_until');
			$table->smallInteger('status');
			$table->timestamps();
		});

		// next iteration
		// Schema::create('news',function($table){});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
		Schema::dropIfExists('participants');
		Schema::dropIfExists('group_members');
		Schema::dropIfExists('contest');
		Schema::dropIfExists('group_contest');
		Schema::dropIfExists('group_activites');
		Schema::dropIfExists('messages');
	}

}