<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('pairnt_id')->nullable();
			$table->string('slug');
			$table->integer('is_activate');
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}