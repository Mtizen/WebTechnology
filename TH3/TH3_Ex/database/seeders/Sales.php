<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Sales extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $medicineIds = DB::table('medicines')->pluck('medicine_id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement($medicineIds),
                'quantity' => $faker->numberBetween(1, 20),
                'sale_date' => $faker->dateTimeThisYear->format('Y-m-d'),
                'customer_phone' => $faker->phoneNumber,
            ]);
        }
    }
}
