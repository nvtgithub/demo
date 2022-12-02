<?php

namespace App\Services\Trademarks;

use App\Repositories\Trademarks\TrademarksRepositoryInterface;
use App\Services\BaseService;

class TrademarksService extends BaseService implements TrademarksServiceInterface
{
    public $repository;

    public function __construct(TrademarksRepositoryInterface $TrademarksRepository)
    {
        $this->repository = $TrademarksRepository;
    }

}
