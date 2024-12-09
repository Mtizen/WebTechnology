<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ManagerLaptop extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('renters')->insert([
                'name' => $faker->name, 
                'phone_number' => $faker->phoneNumber, 
                'email' => $faker->unique()->safeEmail, 
            ]);
        }

        $renterIds = DB::table('renters')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->company,
                'model' => $faker->word, 
                'specifications' => $faker->sentence(6), 
                'rental_status' => $faker->randomElement(['Available', 'Rented']), 
                'renter_id' => $faker->randomElement($renterIds), 
            ]);
        }
    }
}
