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
     *
     * @param string $symbol
     * @return object
     */
    public function findBySymbol(string $symbol)
    {
        return $this->entity->where('symbol', $symbol)->first();
    }

    /**
     * Find StockPrice by symbol
     *
     * @param int $symbol
     * @return object
     */
    public function findById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create StockPrice
     *
     * @param  array $stockPrice
     */
    public function create(array $stockPrice)
    {
        return $this->entity->create($stockPrice);
    }

    /**
     * Update StockPrice
     *
     * @param object $stockPrice
     * @param  array $stockPriceArray
     */
    public function update(object $stockPrice, array $stockPriceArray)
    {
        return $stockPrice->update($stockPriceArray);
    }
}
