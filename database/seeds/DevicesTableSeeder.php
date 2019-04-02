<?php

use Illuminate\Database\Seeder;
use App\Models\Device;

class DevicesTableSeeder extends Seeder
{
    public function run()
    {
        $devices = factory(Device::class)->times(50)->make()->each(function ($device, $index) {
            if ($index == 0) {
                // $device->field = 'value';
            }
        });

        Device::insert($devices->toArray());
    }

}

