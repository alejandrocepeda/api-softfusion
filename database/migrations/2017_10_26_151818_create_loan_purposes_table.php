<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateLoanPurposesTable.
 */
class CreateLoanPurposesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('loan_purposes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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
        Schema::dropIfExists('loan_purposes');
    }
}
