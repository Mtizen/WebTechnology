<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'computer_name' => $faker->unique()->word(), 
                'model' => $faker->bothify('Model-###??'), 
                'operating_system' => $faker->randomElement(['Windows', 'macOS', 'Linux']),
                'processor' => $faker->randomElement(['Intel Core i3', 'Intel Core i5', 'Intel Core i7', 'Intel Core i9', 'AMD Ryzen 5', 'AMD Ryzen 7']),
                'memory' => $faker->numberBetween(4, 512), 
                'available' => $faker->boolean, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
