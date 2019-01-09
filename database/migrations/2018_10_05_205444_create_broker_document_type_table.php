<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokerDocumentTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broker_document_type', function (Blueprint $table) {
            $table->increments('id');
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('broker_document_type');
    }
}
