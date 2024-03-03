<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurants;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $restaurants = [
            ["name" => "Mc Donalds"],
            ["name" => "Taco Bell"],
            ["name" => "BBQ Hut"],
            ["name" => "Vege Deli"],
            ["name" => "Pizzeria"],
            ["name" => "Panda Express"],
            ["name" => "Olive Garden"],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurants::query()->create($restaurant);
        }
    }
}

