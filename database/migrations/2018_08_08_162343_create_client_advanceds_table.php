<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAdvancedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_advanceds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lender_id');
            $table->unsignedInteger('periodicity_id');
            $table->unsignedInteger('application_id');
            $table->unsignedInteger('payment');
            $table->unsignedInteger('amount');
            $table->dateTime('funded_at');
            $table->softDeletes();
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
        Schema::dropIfExists('client_advanceds');
    }
}
