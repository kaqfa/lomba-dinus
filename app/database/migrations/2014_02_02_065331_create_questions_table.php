<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('question');
			$table->string('optA', 200);
			$table->string('optB', 200);
			$table->string('optC', 200);
			$table->string('optD', 200);
			$table->string('optE', 200);
			$table->tinyInteger('answer');
			$table->tinyInteger('type');
			$table->integer('test_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}