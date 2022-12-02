<?php

namespace App\Repositories\Trademarks;

use App\Models\Trademarks;
use App\Repositories\BaseRepository;

class TrademarksRepository extends BaseRepository implements TrademarksRepositoryInterface
{
    public function getModel()
    {
        return Trademarks::class;
    }
}
