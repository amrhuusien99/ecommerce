<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrandTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('brand_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('local');
			$table->integer('brand_id');
		});
	}

	public function down()
	{
		Schema::drop('brand_translations');
	}
}