<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedDevCategoriesData extends Migration
{
    public function up()
    {
        $devcategories = [
            [
                'name'        => '单片机',
                'description' => '硬件',
            ],
            [
                'name'        => '驱动',
                'description' => '软件',
            ],
        ];

        DB::table('dev_categories')->insert($devcategories);
    }

    public function down()
    {
        DB::table('dev_categories')->truncate();
    }
}
