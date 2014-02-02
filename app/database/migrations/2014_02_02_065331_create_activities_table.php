<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivitiesTable extends Migration {

	public function up()
	{
		Schema::create('activities', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->text('description');
			$table->date('date_from');
			$table->date('date_until');
			$table->tinyInteger('type');
			$table->integer('contest_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('activities');
	}
}