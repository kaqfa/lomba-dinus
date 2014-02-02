<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('Users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('username', 40)->unique();
			$table->string('password', 60);
			$table->string('name', 50);
			$table->string('email', 200)->unique();
			$table->string('contact', 25);
			$table->tinyInteger('level');
			$table->timestamp('last_login');
			$table->tinyInteger('status');
		});
	}

	public function down()
	{
		Schema::drop('Users');
	}
}