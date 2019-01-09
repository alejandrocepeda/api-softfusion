<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAppliesTable.
 */
class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lead_id')->index();
            $table->unsignedInteger('loan_amount')->nullable();
            $table->unsignedInteger('product_id')->default(1)->index();
            $table->unsignedInteger('loan_purpose_id')->nullable();
            $table->unsignedInteger('business_id')->nullable()->index();
            $table->unsignedInteger('application_status_id')->default(1)->index();
            $table->unsignedInteger('processor_id')->index()->nullable();
            $table->boolean('bankruptcy')->default(false);
            $table->boolean('collateral')->default(false);
            $table->unsignedInteger('coborrower_id')->index()->nullable();
            $table->unsignedInteger('exist_debt')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
