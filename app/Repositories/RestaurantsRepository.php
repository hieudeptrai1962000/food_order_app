<?php

namespace App\Repositories;

use App\Models\Restaurants;
use Prettus\Repository\Eloquent\BaseRepository;

class RestaurantsRepository extends BaseRepository
{
    public function model()
    {
        return Restaurants::class;
    }
}
