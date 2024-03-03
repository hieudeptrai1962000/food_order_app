<?php

namespace App\Repositories;

use App\Models\MealTime;
use Prettus\Repository\Eloquent\BaseRepository;

class MealTimeRepository extends BaseRepository
{
    public function model()
    {
        return MealTime::class;
    }
}
