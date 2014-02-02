<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('participants', function(Blueprint $table) {
			$table->foreign('created_by')->references('id')->on('Users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('participants', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('Users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('groups', function(Blueprint $table) {
			$table->foreign('contest_id')->references('id')->on('contests')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('activities', function(Blueprint $table) {
			$table->foreign('contest_id')->references('id')->on('contests')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->foreign('from')->references('id')->on('Users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('participants', function(Blueprint $table) {
			$table->dropForeign('participants_created_by_foreign');
		});
		Schema::table('participants', function(Blueprint $table) {
			$table->dropForeign('participants_user_id_foreign');
		});
		Schema::table('groups', function(Blueprint $table) {
			$table->dropForeign('groups_contest_id_foreign');
		});
		Schema::table('activities', function(Blueprint $table) {
			$table->dropForeign('activities_contest_id_foreign');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_test_id_foreign');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->dropForeign('messages_from_foreign');
		});
	}
}