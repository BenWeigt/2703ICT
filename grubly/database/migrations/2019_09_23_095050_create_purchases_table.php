<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_id');
			$table->bigInteger('restaurant_id');
			$table->float('total');
			/**
			 * Purchases should be essentially immutable after creation. We will JSON serialize the
			 * purchase details (products, address) here rather than link to their id's to prevent 
			 * mutations/removals on those entities corrupting our reciept data.
			 */
			$table->string('products');
			$table->string('address');
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
		Schema::dropIfExists('purchases');
	}
}
