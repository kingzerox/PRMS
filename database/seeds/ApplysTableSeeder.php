<?php

use Illuminate\Database\Seeder;
use App\Models\Apply;

class ApplysTableSeeder extends Seeder
{
    public function run()
    {
        $applys = factory(Apply::class)->times(50)->make()->each(function ($apply, $index) {
            if ($index == 0) {
                // $apply->field = 'value';
            }
        });

        Apply::insert($applys->toArray());
    }

}

