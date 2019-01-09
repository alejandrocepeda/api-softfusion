<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('read_items', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('read')->default(false);
            $table->unsignedInteger('user_id')->index();
            $table->string('readtable_id')->nullable();
            $table->string('readtable_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('read_items');
    }
}
