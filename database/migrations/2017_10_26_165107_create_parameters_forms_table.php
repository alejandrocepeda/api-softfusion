<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateParametersFormsTable.
 */
class CreateParametersFormsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('parameters_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('status')->default(true);
            $table->unsignedInteger('parameters_form_category_id')->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('parameters_forms');
    }
}
