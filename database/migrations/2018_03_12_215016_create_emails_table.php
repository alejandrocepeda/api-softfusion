<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('email_template_id')->nullable();
            $table->string('subject')->nullable();
            $table->longText('body')->nullable();
			$table->unsignedInteger('sendertable_id')->nullable();
			$table->string('sendertable_type')->nullable();
            $table->unsignedInteger('activity_id')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
