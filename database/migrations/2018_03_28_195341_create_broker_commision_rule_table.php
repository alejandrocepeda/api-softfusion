<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokerCommisionRuleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('broker_commision_rule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('broker_info_id');
            $table->integer('commision_rule_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('broker_commision_rule');
    }
}
