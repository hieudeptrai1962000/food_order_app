<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $this->call(RestaurantsSeeder::class);
//        $this->call(MealTimeSeeder::class);
        $this->call(MealNameSeeder::class);
    }
}
