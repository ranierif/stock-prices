<?php

namespace App\Repositories;

use App\Interfaces\StockPriceRepositoryInterface;
use App\Models\StockPrice;

class StockPriceRepository implements StockPriceRepositoryInterface
{
    protected $entity;

    public function __construct(StockPrice $stockPrice)
    {
        $this->entity = $stockPrice;
    }

    /**
     * Find StockPrice by symbol
     * @return array
     */
    public function findBySymbol(string $symbol)
    {
        return $this->entity->where('symbol', $symbol)->first();
    }
}
