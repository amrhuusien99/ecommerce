<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavoratesTable extends Migration {

	public function up()
	{
		Schema::create('favorates', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id');
			$table->integer('product_id');
		});
	}

	public function down()
	{
		Schema::drop('favorates');
	}
}