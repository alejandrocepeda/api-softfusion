<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lender_id');
            $table->integer('amount');
            $table->integer('periodicity_id');
            $table->double('payback');
            $table->integer('terms');
            $table->double('interest_rate');
            $table->integer('application_id');
            $table->boolean('status');
            $table->boolean('funded');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('approvals');
    }
}
