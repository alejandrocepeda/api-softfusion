<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191)->nullable();
            $table->unsignedInteger('federal_tax_id')->nullable();
            $table->unsignedInteger('address_id')->nullable();
            $table->unsignedInteger('years_in_business_id')->nullable();
            $table->unsignedInteger('annual_revenue_id')->nullable();
            $table->unsignedInteger('credit_score_id')->nullable();
            $table->unsignedInteger('industry_id')->nullable();
            $table->unsignedInteger('how_do_you_hear_id')->nullable();
            $table->unsignedBigInteger('phone')->nullable();
            $table->unsignedInteger('phone_ext')->nullable();
            $table->string('web')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
