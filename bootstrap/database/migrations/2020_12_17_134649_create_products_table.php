<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('slug')->unique();
			$table->string('photo');
			$table->integer('quantity')->nullable();
			$table->string('sku')->nullable();
			$table->integer('price');
			$table->integer('speecial_peice')->nullable();
			$table->integer('selling_price')->nullable();
			$table->string('special_peice_tayp')->nullable();
			$table->date('special_peice_start')->nullable();
			$table->date('special_peice_end')->nullable();
			$table->integer('manage_stoke');
			$table->integer('is_stock');
			$table->integer('is_activate');
			$table->integer('brand_id');
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}