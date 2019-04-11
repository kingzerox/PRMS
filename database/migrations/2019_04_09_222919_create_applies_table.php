<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliesTable extends Migration
{
	public function up()
	{
		Schema::create('applies', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id')->unsigned()->default(0)->index();
            $table->integer('user_id')->unsigned()->default(0)->index();
            $table->integer('app_status_id')->unsigned()->default(1)->index();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('applies');
	}
}
