<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MealTime;

class MealTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $mealTimes = [
            ["name" => "breakfast"],
            ["name" => "lunch"],
            ["name" => "dinner"],
        ];

        foreach ($mealTimes as $mealTime) {
            MealTime::query()->create($mealTime);
        }
    }
}

