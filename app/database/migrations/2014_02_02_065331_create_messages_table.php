<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	public function up()
	{
		Schema::create('messages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('from')->unsigned();
			$table->string('to', 200);
			$table->string('title', 200);
			$table->text('content');
			$table->date('last_until');
			$table->tinyInteger('status');
		});
	}

	public function down()
	{
		Schema::drop('messages');
	}
}