<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      Schema::create('product_images', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->integer('product_id')->unsigned();
         // Set Foreign Key main_id reference maincategories.id
         $table->foreign('product_id')
            ->references('id')
            ->on('products');
         $table->timestamps();
      });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product-image', function(Blueprint $table)
		{
			//
		});
	}

}
