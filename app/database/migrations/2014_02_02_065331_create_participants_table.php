<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParticipantsTable extends Migration {

	public function up()
	{
		Schema::create('participants', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nim', 15)->nullable();
			$table->string('name', 50);
			$table->string('email', 200)->unique();
			$table->string('ktm_file', 200);
			$table->integer('created_by')->unsigned();
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('participants');
	}
}