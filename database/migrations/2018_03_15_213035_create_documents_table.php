<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('documentable_id')->nullable();
            $table->string('documentable_type')->nullable();
            $table->string('url')->nullable();
            $table->unsignedInteger('document_type_id')->index();
            $table->unsignedInteger('user_id')->index()->nullable();
            $table->unsignedInteger('size')->nullable();
            $table->string('period')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
