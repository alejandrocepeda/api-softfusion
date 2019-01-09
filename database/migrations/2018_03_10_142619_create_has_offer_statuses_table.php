<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasOfferStatusesTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('has_offer_statuses', function(Blueprint $table){
			$table->increments('id');
			$table->string('name', 191);
			$table->boolean('status')->default(true);
			$table->enum('level', ['success', 'warning', 'danger'])->default('warning');
			
			$table->timestamps();
			$table->softDeletes();
		});
	}
	
	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('has_offer_statuses');
	}
}
