<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSliderTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('slider_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->string('local');
			$table->integer('slider_id');
		});
	}

	public function down()
	{
		Schema::drop('slider_translations');
	}
}