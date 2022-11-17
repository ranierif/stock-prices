<?php

namespace App\Repositories\Interfaces;

interface StockPriceRepositoryInterface
{
    /**
     * Get all
     *
     * @return object
     */
    public function getAll();

    /**
     * Find by symbol
     *
     * @param  mixed $symbol
     * @return object
     */
    public function findBySymbol(string $symbol);

    /**
     * Find by id
     *
     * @param  mixed $id
     * @return object
     */
    public function findById(int $id);

    /**
     * Create
     *
     * @param  mixed $attributes
     * @return object
     */
    public function create(array $attributes);

    /**
     * Update
     *
     * @param  object $stockPrice
     * @param  array $attributes
     * @return bool
     */
    public function update(object $stockPrice, array $attributes);
}
