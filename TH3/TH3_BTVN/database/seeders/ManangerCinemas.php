<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ManagerCinemas extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('cinemas')->insert([
                'name' => $faker->company, 
                'location' => $faker->address, 
                'total_seats' => $faker->numberBetween(50, 300), 
            ]);
        }

        $cinemaIds = DB::table('cinemas')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3), 
                'director' => $faker->name, 
                'release_date' => $faker->date(), 
                'duration' => $faker->numberBetween(90, 180), 
                'center_id' => $faker->randomElement($cinemaIds), 
            ]);
        }
    }
}
