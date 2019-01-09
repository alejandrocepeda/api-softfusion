<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommisionRulesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('commision_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commision_type_id');
            $table->integer('dynamic_var_id');
            $table->integer('math_operator_id');
            $table->integer('value');
            $table->double('commision');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('commision_rules');
    }
}
