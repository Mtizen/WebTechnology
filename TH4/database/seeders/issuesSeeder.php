<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class issuesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

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
