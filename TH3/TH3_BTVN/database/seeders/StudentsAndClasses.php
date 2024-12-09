<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentsAndClasses extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement(['Pre-K', 'Kindergarten']),
                'room_number' => $faker->numerify('Room ##'), 
            ]);
        }

        $classIds = DB::table('classes')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date('Y-m-d', '-5 years'), 
                'parent_phone' => $faker->phoneNumber,
                'class_id' => $faker->randomElement($classIds), 
            ]);
        }
    }
}
