<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttributeTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('attribute_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('local');
			$table->integer('attribute_id');
		});
	}

	public function down()
	{
		Schema::drop('attribute_translations');
	}
}