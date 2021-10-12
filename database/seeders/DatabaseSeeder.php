<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('chairs')->truncate();

        for($i = 0; $i < 150; $i++) {
            DB::table('chairs')->insert([
                'category' => $faker->randomElement(['wooden', 'metallic']),
                'name' => $faker->randomElement(['foo', 'bar', 'baz']),
                'legs' => $faker->numberBetween(3, 4),
                'color' => $faker->randomElement(['red', 'green', 'blue']),
                'height' => $faker->numberBetween(2, 3),
                'has_back_rest' => $faker->boolean,
            ]);
        }
    }
}
