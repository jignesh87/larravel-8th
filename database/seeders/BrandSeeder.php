<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table("brands")->insert([
            "short_name" => $faker->name(),
            "full_name" => $faker->name(),
            "narrative" => $faker->text($maxNbChars = 200),
        ]);
    }
}
