<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('tags_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('local');
			$table->string('tag_id');
		});
	}

	public function down()
	{
		Schema::drop('tags_translations');
	}
}