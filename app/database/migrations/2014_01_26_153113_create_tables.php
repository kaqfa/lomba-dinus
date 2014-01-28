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
		
		Schema::create('activites', function($table){
			$table->increments('id');
			$table->string('name', 200);
			$table->text('description')->nullable();
			$table->integer('contest_id')->unsigned();
			$table->date('from')->nullable();
			$table->date('until')->nullable();
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
		
		Schema::create('tests', function($tb){
			$tb->increments('id');
			$tb->string('name', 200);
			$tb->text('description');
			$tb->date('from')->nullable();
			$tb->date('until')->nullable();
			$tb->smallInteger('minutes');
			$tb->timestamps();
		});
		
		Schema::create('questions', function($tb){
			$tb->increments('id');
			$tb->text('question');
			$tb->string('optA', 200);
			$tb->string('optB', 200);
			$tb->string('optC', 200);
			$tb->string('optD', 200);
			$tb->string('optE', 200);
			$tb->smallInteger('answer');
			$tb->smallInteger('type');
			$tb->timestamps();
		});
		
		Schema::create('group_answers', function($tb){
			$tb->increments('id');
			$tb->integer('question_id')->unsigned();
			$tb->integer('group_id')->unsigned();
			$tb->smallInteger('answer');			
			$tb->timestamps();
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
		Schema::dropIfExists('contests');
		Schema::dropIfExists('group_contest');
		Schema::dropIfExists('group_activites');
		Schema::dropIfExists('messages');
	}

}