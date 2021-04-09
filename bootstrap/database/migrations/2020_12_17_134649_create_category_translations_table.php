<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('category_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('local');
			$table->integer('category_id');
		});
	}

	public function down()
	{
		Schema::drop('category_translations');
	}
}