<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
			$table->String('email');
            $table->unsignedInteger('address_id')->index()->nullable();
            $table->unsignedInteger('business_id')->index()->nullable();
            $table->unsignedBigInteger('phone')->nullable();
            $table->unsignedInteger('phone_ext')->nullable();
            $table->unsignedInteger('social_security')->nullable();
            $table->date('birthdate')->nullable();
	        $table->double('ownership', 5, 2)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
