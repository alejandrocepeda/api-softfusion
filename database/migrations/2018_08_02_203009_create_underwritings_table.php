<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnderwritingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('underwritings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bank_id');
            $table->unsignedInteger('application_id');
            $table->unsignedSmallInteger('last_four_digits');
            $table->unsignedInteger('total_deposits');
            $table->unsignedSmallInteger('number_deposits');
            $table->dateTime('month');
            $table->Integer('ending_balance');
            $table->Integer('avg_daily_balance');
            $table->unsignedInteger('nsfs')->nullable();
	        $table->unsignedSmallInteger('negative_days')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('underwritings');
    }
}
