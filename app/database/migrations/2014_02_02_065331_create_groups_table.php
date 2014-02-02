<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupsTable extends Migration {

	public function up()
	{
		Schema::create('groups', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 90);
			$table->string('advisor', 50);
			$table->string('contact', 25);
			$table->integer('contest_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('groups');
	}
}