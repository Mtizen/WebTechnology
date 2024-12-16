<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class issuesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 10), 
                'reported_by' => $faker->name, 
                'reported_date' => $faker->dateTimeBetween('-1 year', 'now'), 
                'description' => $faker->sentence(10), 
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']), 
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
