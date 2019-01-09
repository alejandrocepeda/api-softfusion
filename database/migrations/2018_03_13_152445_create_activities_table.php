<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up()
	{
		Schema::create('activities', function(Blueprint $table){
			$table->increments('id');
			$table->string('title')->nullable();
			$table->text('description')->nullable();
			$table->unsignedInteger('activity_type_id')->index()->default(1);
			$table->unsignedInteger('activity_status_id')->index()->default(1);
			$table->unsignedSmallInteger('duration')->nullable();
			$table->unsignedInteger('activity_call_status_id')->index()->nullable();
			$table->unsignedInteger('user_id')->index();
			$table->unsignedInteger('assign_to')->nullable();
			$table->integer('activitytable_id')->nullable();
			$table->string('activitytable_type')->nullable();
			$table->boolean('notified')->default(false);
			$table->timestamp('finish_at')->nullable();
			$table->timestamp('remember_at')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}
	
	/**
	 * Reverse the migrations.
	 */
	public function down()
	{
		Schema::dropIfExists('activities');
	}
}
