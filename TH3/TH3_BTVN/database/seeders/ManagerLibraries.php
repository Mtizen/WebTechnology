<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ManagerLibraries extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('Libraries')->insert([
                'name' => $faker->company, 
                'address' => $faker->address, 
                'contact_number' => $faker->phoneNumber, 
            ]);
        }

        $LibraryIds = DB::table('Libraries')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3), 
                'author' => $faker->name, 
                'publication_year' => $faker->year, 
                'genre' => $faker->word, 
                'Library_id' => $faker->randomElement($LibraryIds), 
            ]);
        }
    }
}
