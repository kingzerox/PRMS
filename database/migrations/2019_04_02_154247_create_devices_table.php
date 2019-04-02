<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration 
{
	public function up()
	{
		Schema::create('devices', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('body');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('dev_category_id')->unsigned()->index();
            $table->integer('last_user_id')->unsigned()->default(0);
            $table->integer('order')->unsigned()->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('devices');
	}
}
