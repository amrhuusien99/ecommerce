<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('option_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('local');
			$table->string('option_id');
		});
	}

	public function down()
	{
		Schema::drop('option_translations');
	}
}