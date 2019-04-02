<?php

use Illuminate\Database\Seeder;
use App\Models\Device;
use App\Models\User;
use App\Models\DevCategory;

class DevicesTableSeeder extends Seeder
{
    public function run()
    {
        // 所有用户 ID 数组，如：[1,2,3,4]
        $user_ids = User::all()->pluck('id')->toArray();

        // 所有分类 ID 数组，如：[1,2,3,4]
        $devcategory_ids = DevCategory::all()->pluck('id')->toArray();

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $devices = factory(Device::class)
                        ->times(100)
                        ->make()
                        ->each(function ($device, $index)
                            use ($user_ids, $devcategory_ids, $faker)
        {
            // 从用户 ID 数组中随机取出一个并赋值
            $device->user_id = $faker->randomElement($user_ids);

            // 话题分类，同上
            $device->dev_category_id = $faker->randomElement($devcategory_ids);
        });


        Device::insert($devices->toArray());
    }

}

