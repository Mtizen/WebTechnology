<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersAndIssues extends Seeder
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

        $computerIds = DB::table('computers')->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computerIds), 
                'reported_by' => $faker->name, 
                'reported_date' => $faker->dateTimeThisYear->format('Y-m-d H:i:s'), 
                'description' => $faker->sentence, 
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']), 
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']), 
            ]);
        }
    }
}
