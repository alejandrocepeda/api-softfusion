<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateYearsInBusinessesTable.
 */
class CreateYearsInBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('years_in_business', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40);
            $table->unsignedTinyInteger('order')->default(0);
            $table->unsignedSmallInteger('value')->default(0);
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('years_in_business');
    }
}
