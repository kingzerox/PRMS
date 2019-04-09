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
            $table->text('description');
            $table->integer('dev_category_id')->unsigned()->index();
            $table->integer('last_user_id')->unsigned()->default(0);
            $table->integer('status_id')->unsigned()->index()->default(1);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('devices');
	}
}
