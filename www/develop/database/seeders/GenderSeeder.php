<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 0; $i <10; $i++) {
          DB::table('genders')->insert([
            'name' => Str::random(100),
            'gender_id' => $i,
            'short_name' => Str::random(10),
          ]);
        }
    }
}
