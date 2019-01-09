<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateLenderProductPivotTable.
 */
class CreateLenderProductPivotTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lender_product', function (Blueprint $table) {
            $table->integer('lender_id')->unsigned()->index();
            $table->foreign('lender_id')->references('id')->on('lenders')->onDelete('cascade');
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->primary(['lender_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('lender_product');
    }
}
