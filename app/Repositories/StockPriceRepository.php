<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use App\Models\StockPrice;
use App\Repositories\BaseRepository;

class StockPriceRepository extends BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct(StockPrice $stockPrice)
    {
        $this->model = $stockPrice;
    }
}
