<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDocumentsTypeTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('item_documents_type', function(Blueprint $table){
			$table->increments('id');
			$table->unsignedInteger('documentable_id')->nullable();
			$table->string('documentable_type')->nullable();
			$table->unsignedInteger('document_type_id')->index();
			$table->unsignedInteger('periodicity_id')->default(1)->index();
			$table->unsignedSmallInteger('quantity')->default(1);
			$table->boolean('multiple')->default(false);
			$table->unsignedSmallInteger('order')->default(1);
			$table->boolean('required')->default(false);
			$table->boolean('status')->default(true);
			$table->timestamps();
		});
	}
	
	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('item_documents_type');
	}
}
