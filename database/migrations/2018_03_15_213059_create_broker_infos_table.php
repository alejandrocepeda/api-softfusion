<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokerInfosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('broker_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('brokertable_id')->nullable();
            $table->string('brokertable_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('broker_infos');
    }
}
