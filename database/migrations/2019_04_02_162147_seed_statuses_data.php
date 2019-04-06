<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedStatusesData extends Migration
{
    public function up()
    {
        $statuses = [
            [
                'name'        => '空闲',
                'description' => '可使用的设备',
            ],
            [
                'name'        => '审核中',
                'description' => '管理员审核中',
            ],
            [
                'name'        => '使用中',
                'description' => '用户使用中',
            ],
        ];

        DB::table('statuses')->insert($statuses);
    }

    public function down()
    {
        DB::table('statuses')->truncate();
    }
}
