<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsPeriodiCitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('document_periodicity', function (Blueprint $table) {
            $table->integer('document_type_id')->index();
            $table->integer('periodicity_id')->index();
			$table->integer('quantity');
            $table->boolean('status')->default();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('document_periodicity');
    }
}
