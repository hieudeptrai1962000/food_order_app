<?php

namespace App\Repositories;

use App\Models\MealName;
use Prettus\Repository\Eloquent\BaseRepository;

class MealNameRepository extends BaseRepository
{
    public function model()
    {
        return MealName::class;
    }
}
