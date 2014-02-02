<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration {

	public function up()
	{
		Schema::create('tests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->text('description');
			$table->decimal('date_from');
			$table->date('date_until');
			$table->smallInteger('minutes');
		});
	}

	public function down()
	{
		Schema::drop('tests');
	}
}