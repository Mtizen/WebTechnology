<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ManagerItCenters extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('it_centers')->insert([
                'name' => $faker->company, 
                'location' => $faker->address, 
                'contact_email' => $faker->unique()->safeEmail, 
            ]);
        }

        $centerIds = DB::table('it_centers')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word, 
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean, 
                'center_id' => $faker->randomElement($centerIds), 
            ]);
        }
    }
}
