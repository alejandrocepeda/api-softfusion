<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadStatusesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lead_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->boolean('status')->default(true);
            $table->unsignedSmallInteger('step')->default(1);
            $table->enum('level', ['success', 'warning', 'danger'])->default('success');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('lead_statuses');
    }
}
