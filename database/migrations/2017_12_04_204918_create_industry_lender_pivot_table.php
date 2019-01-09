<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateIndustryLenderPivotTable.
 */
class CreateIndustryLenderPivotTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lender_industry', function (Blueprint $table) {
            $table->integer('lender_id')->unsigned()->index();
            $table->foreign('lender_id')->references('id')->on('lenders')->onDelete('cascade');
            $table->integer('industry_id')->unsigned()->index();
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
            $table->boolean('favorite')->default(false);
            $table->primary(['lender_id', 'industry_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('lender_industry');
    }
}
