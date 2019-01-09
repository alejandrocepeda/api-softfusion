<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateLendersTable.
 */
class CreateLendersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lenders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('email')->nullable();
            $table->unsignedInteger('contact_id')->nullable();
            $table->unsignedInteger('min_loan_size')->default(0)->nullable();
            $table->unsignedInteger('max_loan_size')->nullable();
            $table->unsignedSmallInteger('min_terms')->default(0)->nullable();
            $table->unsignedSmallInteger('max_terms')->nullable();
            $table->unsignedDecimal('min_interest', 5, 2)->nullable();
            $table->unsignedDecimal('max_interest', 5, 2)->nullable();
            $table->unsignedSmallInteger('max_loan_position')->nullable();
            $table->unsignedSmallInteger('max_ltv')->nullable();
            $table->unsignedSmallInteger('min_credit_score_id')->index()->nullable();
            $table->unsignedSmallInteger('years_in_business_id')->index()->default(8)->nullable();
            $table->unsignedSmallInteger('annual_revenue_id')->index()->default(1)->nullable();
            $table->unsignedSmallInteger('negative_days')->default(0)->nullable();
            $table->boolean('consolidation_refinance')->default(0);
            $table->boolean('weekly_payments')->default(0);
            $table->boolean('puerto_rico')->default(0);
            $table->boolean('favorite')->default(0);
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('lenders');
    }
}
