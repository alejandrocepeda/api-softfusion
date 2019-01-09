<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateHasOffersAffiliateTrackingsTable.
 */
class CreateHasOfferesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('has_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lead_id')->index();
            $table->unsignedInteger('application_id')->nullable();
            $table->string('transaction_id');
            $table->unsignedInteger('has_offer_status_id');
            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('affiliate_id');
            $table->unsignedInteger('broker_id')->index()->nullable();
            $table->string('ip');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('has_offers');
    }
}
