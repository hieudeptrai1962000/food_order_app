<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealTime extends Model
{
    protected $table = "meal_time";

    protected $guarded = ['id'];

    public function restaurants()
    {
        return $this->hasManyThrough(
            Restaurants::class,
            MealName::class,
            'meal_time_id',
            'id',
            'id',
            'restaurant_id'
        );
    }
}
