<?php

namespace App\Repositories;

use App\Repositories\Interfaces\StockPriceRepositoryInterface;
use App\Models\StockPrice;
use Illuminate\Database\Eloquent\Collection;

class StockPriceRepository implements StockPriceRepositoryInterface
{
    protected $entity;

    /**
    * StockPriceRepository constructor.
    *
    * @param \App\Models\StockPrice $stockPrice
    */
    public function __construct(StockPrice $stockPrice)
    {
        $this->entity = $stockPrice;
    }

    /**
     * Get all StockPrices
     *
     * @return object;
     */
    public function getAll()
    {
        return $this->entity->get();
    }

    /**
     * Find StockPrice by symbol
     *
     * @param  string $symbol
     * @return object;
     */
    public function findBySymbol(string $symbol)
    {
        return $this->entity->where('symbol', $symbol)->first();
    }

    /**
     * Find StockPrice by symbol
     *
     * @param  int $symbol
     * @return object;
     */
    public function findById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Create StockPrice
     *
     * @param  array $attributes
     * @return object;
     */
    public function create(array $attributes)
    {
        return $this->entity->create($attributes);
    }

    /**
     * Update StockPrice
     *
     * @param  object $stockPrice
     * @param  array $attributes
     * @return bool
     */
    public function update(object $stockPrice, array $attributes): bool
    {
        return $stockPrice->update($attributes);
    }
}
