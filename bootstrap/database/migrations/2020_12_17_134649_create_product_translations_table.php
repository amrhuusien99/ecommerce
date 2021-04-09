<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTranslationsTable extends Migration {

	public function up()
	{
		Schema::create('product_translations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('local')->unique();
			$table->string('description');
			$table->string('short_description')->nullable();
			$table->integer('product_id')->unique();
		});
	}

	public function down()
	{
		Schema::drop('product_translations');
	}
}