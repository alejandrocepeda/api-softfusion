<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateLenderParamentersFormPivotTable.
 */
class CreateLenderParamentersFormPivotTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lender_parameters_form', function (Blueprint $table) {
            $table->integer('lender_id')->unsigned()->index();
            $table->foreign('lender_id')->references('id')->on('lenders')->onDelete('cascade');
            $table->integer('parameters_form_id')->unsigned()->index();
            $table->foreign('parameters_form_id')->references('id')->on('parameters_forms')->onDelete('cascade');
            $table->primary(['lender_id', 'parameters_form_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('lender_parameters_form');
    }
}
