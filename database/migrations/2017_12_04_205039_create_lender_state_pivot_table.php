<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateLenderStatePivotTable.
 */
class CreateLenderStatePivotTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lender_state', function (Blueprint $table) {
            $table->integer('lender_id')->unsigned()->index();
            $table->foreign('lender_id')->references('id')->on('lenders')->onDelete('cascade');
            $table->integer('state_id')->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->primary(['lender_id', 'state_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('lender_state');
    }
}
