<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->comment('名称');
            $table->text('description')->nullable()->comment('描述');
            $table->integer('dev_count')->default(0)->comment('数量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dev_categories');
    }
}
