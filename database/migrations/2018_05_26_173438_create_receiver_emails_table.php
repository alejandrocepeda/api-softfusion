<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiverEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivertables', function (Blueprint $table) {
        	$table->increments('id');
        	$table->unsignedInteger('email_id')->index();
        	$table->enum('type',['to','cc','bcc'])->index();
        	$table->nullableMorphs('receivertable');
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
        Schema::dropIfExists('receivertables');
    }
}
