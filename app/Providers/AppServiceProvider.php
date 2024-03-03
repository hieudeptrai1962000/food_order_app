<?php

namespace App\Providers;

use App\Models\MealName;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('in_valid_dish', function ($attribute, $value, $parameters, $validator) {
            $validRestaurants = MealName::query()
                ->where('restaurant_id', '=', session('food_order.restaurant'))
                ->where('meal_time_id', '=', session('food_order.meal_time'))
                ->pluck('id');

            return collect($value)->every(function ($item) use ($validRestaurants) {
                return in_array($item, $validRestaurants->toArray());
            });
        });
    }
}
