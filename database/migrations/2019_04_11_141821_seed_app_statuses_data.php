<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedAppStatusesData extends Migration
{
    public function up()
    {
        $appstatuses = [
            [
                'name'        => '审核中',
                'description' => '管理员审核中',
            ],
            [
                'name'        => '同意申请',
                'description' => '管理员同意申请',
            ],
                        [
                'name'        => '拒绝申请',
                'description' => '管理员拒绝申请',
            ],
        ];

        DB::table('app_statuses')->insert($appstatuses);
    }

    public function down()
    {
        DB::table('app_statuses')->truncate();
    }
}
