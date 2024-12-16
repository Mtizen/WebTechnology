<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word, 
                'model' => $faker->word, 
                'operating_system' => $faker->randomElement(['Windows', 'macOS', 'Linux']),
                'processor' => $faker->word,
                'memory' => $faker->numberBetween(4, 32), 
                'available' => $faker->boolean, 
            ]);
        }
    }
}
