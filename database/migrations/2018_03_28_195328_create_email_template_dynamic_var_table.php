<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTemplateDynamicVarTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('email_template_dynamic_var', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('email_template_id');
            $table->integer('dynamic_var_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('email_template_dynamic_var');
    }
}
