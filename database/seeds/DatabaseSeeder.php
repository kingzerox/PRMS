<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 50)->create();
        $this->call(TopicsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
		$this->call(DevicesTableSeeder::class);
		$this->call(ReplysTableSeeder::class);
    }
}
