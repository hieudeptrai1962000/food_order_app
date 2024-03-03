<?php

namespace Database\Seeders;

use App\Models\MealTime;
use App\Models\Restaurants;
use Illuminate\Database\Seeder;
use App\Models\MealName;

class MealNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Lấy id của các nhà hàng và thời gian ăn
        $mcdonaldsId = Restaurants::query()->where('name', '=', 'Mc Donalds')->value('id');
        $tacoBellId = Restaurants::query()->where('name', '=', 'Taco Bell')->value('id');
        $bbqHutId = Restaurants::query()->where('name', '=', 'BBQ Hut')->value('id');
        $vegeDeliId = Restaurants::query()->where('name', '=', 'Vege Deli')->value('id');
        $pizzeriaId = Restaurants::query()->where('name', '=', 'Pizzeria')->value('id');
        $pandaExpressId = Restaurants::query()->where('name', '=', 'Panda Express')->value('id');
        $oliveGardenId = Restaurants::query()->where('name', '=', 'Olive Garden')->value('id');
        $breakfastId = MealTime::query()->where('name', '=', 'Breakfast')->value('id');
        $lunchId = MealTime::query()->where('name', '=', 'Lunch')->value('id');
        $dinnerId = MealTime::query()->where('name', '=', 'Dinner')->value('id');

        $mealNames = [
            ["name" => "Chicken Burger", "restaurant_id" => $mcdonaldsId, "meal_time_id" => $lunchId],
            ["name" => "Chicken Burger", "restaurant_id" => $mcdonaldsId, "meal_time_id" => $dinnerId],
            ["name" => "Ham Burger", "restaurant_id" => $mcdonaldsId, "meal_time_id" => $lunchId],
            ["name" => "Ham Burger", "restaurant_id" => $mcdonaldsId, "meal_time_id" => $dinnerId],
            ["name" => "Cheese Burger", "restaurant_id" => $mcdonaldsId, "meal_time_id" => $lunchId],
            ["name" => "Cheese Burger", "restaurant_id" => $mcdonaldsId, "meal_time_id" => $dinnerId],
            ["name" => "Fries", "restaurant_id" => $mcdonaldsId, "meal_time_id" => $lunchId],
            ["name" => "Fries", "restaurant_id" => $mcdonaldsId, "meal_time_id" => $dinnerId],
            ["name" => "Egg Muffin", "restaurant_id" => $mcdonaldsId, "meal_time_id" => $breakfastId],

            ["name" => "Burrito", "restaurant_id" => $tacoBellId, "meal_time_id" => $lunchId],
            ["name" => "Burrito", "restaurant_id" => $tacoBellId, "meal_time_id" => $dinnerId],
            ["name" => "Tacos", "restaurant_id" => $tacoBellId, "meal_time_id" => $lunchId],
            ["name" => "Tacos", "restaurant_id" => $tacoBellId, "meal_time_id" => $dinnerId],
            ["name" => "Quesadilla", "restaurant_id" => $tacoBellId, "meal_time_id" => $lunchId],
            ["name" => "Quesadilla", "restaurant_id" => $tacoBellId, "meal_time_id" => $dinnerId],

            ["name" => "Steak", "restaurant_id" => $bbqHutId, "meal_time_id" => $dinnerId],
            ["name" => "Yakitori", "restaurant_id" => $bbqHutId, "meal_time_id" => $dinnerId],
            ["name" => "Nankotsu", "restaurant_id" => $bbqHutId, "meal_time_id" => $dinnerId],
            ["name" => "Piman", "restaurant_id" => $bbqHutId, "meal_time_id" => $dinnerId],

            ["name" => "Vegan Bento", "restaurant_id" => $vegeDeliId, "meal_time_id" => $lunchId],
            ["name" => "Coleslaw Sandwich", "restaurant_id" => $vegeDeliId, "meal_time_id" => $breakfastId],
            ["name" => "Grilled Sandwich", "restaurant_id" => $vegeDeliId, "meal_time_id" => $breakfastId],
            ["name" => "Veg. Salad", "restaurant_id" => $vegeDeliId, "meal_time_id" => $lunchId],
            ["name" => "Veg. Salad", "restaurant_id" => $vegeDeliId, "meal_time_id" => $dinnerId],
            ["name" => "Fruit Salad", "restaurant_id" => $vegeDeliId, "meal_time_id" => $lunchId],
            ["name" => "Fruit Salad", "restaurant_id" => $vegeDeliId, "meal_time_id" => $dinnerId],
            ["name" => "Corn Soup", "restaurant_id" => $vegeDeliId, "meal_time_id" => $lunchId],
            ["name" => "Corn Soup", "restaurant_id" => $vegeDeliId, "meal_time_id" => $dinnerId],
            ["name" => "Tomato Soup", "restaurant_id" => $vegeDeliId, "meal_time_id" => $lunchId],
            ["name" => "Tomato Soup", "restaurant_id" => $vegeDeliId, "meal_time_id" => $dinnerId],
            ["name" => "Minestrone Soup", "restaurant_id" => $vegeDeliId, "meal_time_id" => $lunchId],
            ["name" => "Minestrone Soup", "restaurant_id" => $vegeDeliId, "meal_time_id" => $dinnerId],

            ["name" => "Pepperoni Pizza", "restaurant_id" => $pizzeriaId, "meal_time_id" => $lunchId],
            ["name" => "Pepperoni Pizza", "restaurant_id" => $pizzeriaId, "meal_time_id" => $dinnerId],
            ["name" => "Hawaiian Pizza", "restaurant_id" => $pizzeriaId, "meal_time_id" => $lunchId],
            ["name" => "Hawaiian Pizza", "restaurant_id" => $pizzeriaId, "meal_time_id" => $dinnerId],
            ["name" => "Seafood Pizza", "restaurant_id" => $pizzeriaId, "meal_time_id" => $lunchId],
            ["name" => "Seafood Pizza", "restaurant_id" => $pizzeriaId, "meal_time_id" => $dinnerId],
            ["name" => "Deep Dish Pizza", "restaurant_id" => $pizzeriaId, "meal_time_id" => $dinnerId],

            ["name" => "Chow Mein", "restaurant_id" => $pandaExpressId, "meal_time_id" => $lunchId],
            ["name" => "Chow Mein", "restaurant_id" => $pandaExpressId, "meal_time_id" => $dinnerId],
            ["name" => "Mapo Tofu", "restaurant_id" => $pandaExpressId, "meal_time_id" => $lunchId],
            ["name" => "Mapo Tofu", "restaurant_id" => $pandaExpressId, "meal_time_id" => $dinnerId],
            ["name" => "Kung Pao", "restaurant_id" => $pandaExpressId, "meal_time_id" => $lunchId],
            ["name" => "Kung Pao", "restaurant_id" => $pandaExpressId, "meal_time_id" => $dinnerId],
            ["name" => "Wontons", "restaurant_id" => $pandaExpressId, "meal_time_id" => $lunchId],
            ["name" => "Wontons", "restaurant_id" => $pandaExpressId, "meal_time_id" => $dinnerId],

            ["name" => "Garlic Bread", "restaurant_id" => $oliveGardenId, "meal_time_id" => $breakfastId],
            ["name" => "Garlic Bread", "restaurant_id" => $oliveGardenId, "meal_time_id" => $lunchId],
            ["name" => "Garlic Bread", "restaurant_id" => $oliveGardenId, "meal_time_id" => $dinnerId],
            ["name" => "Ravioli", "restaurant_id" => $oliveGardenId, "meal_time_id" => $lunchId],
            ["name" => "Ravioli", "restaurant_id" => $oliveGardenId, "meal_time_id" => $dinnerId],
            ["name" => "Rigatoni Spaghetti", "restaurant_id" => $oliveGardenId, "meal_time_id" => $lunchId],
            ["name" => "Rigatoni Spaghetti", "restaurant_id" => $oliveGardenId, "meal_time_id" => $dinnerId],
            ["name" => "Fettucine Pasta", "restaurant_id" => $oliveGardenId, "meal_time_id" => $lunchId],
            ["name" => "Fettucine Pasta", "restaurant_id" => $oliveGardenId, "meal_time_id" => $dinnerId],
        ];

        foreach ($mealNames as $mealName) {
            MealName::create($mealName);
        }
    }
}
