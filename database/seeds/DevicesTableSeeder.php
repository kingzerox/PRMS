<?php

use Illuminate\Database\Seeder;
use App\Models\Device;
use App\Models\User;
use App\Models\DevCategory;
use App\Models\Status;

class DevicesTableSeeder extends Seeder
{
    public function run(){
        // 所有分类 ID 数组，如：[1,2,3,4]
        $devcategory_ids = DevCategory::all()->pluck('id')->toArray();

        $status_ids = Status::all()->pluck('id')->toArray();

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $devices = factory(Device::class)
                        ->times(100)
                        ->make()
                        ->each(function ($device, $index)
                            use ($devcategory_ids,$status_ids,$faker)
        {

            $device->dev_category_id = $faker->randomElement($devcategory_ids);

            $device->status_id = $faker->randomElement($status_ids);
        });


        Device::insert($devices->toArray());
    }

}

