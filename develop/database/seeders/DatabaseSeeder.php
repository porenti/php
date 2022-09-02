<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CouponSeeder::class);
        $this->call(GenderSeeder::class);
        //$this->call(LaratrustSeeder::class); //заполнить роли
        //\App\Models\User::factory(100)->create(); //заполнить пользователей
    }
}
