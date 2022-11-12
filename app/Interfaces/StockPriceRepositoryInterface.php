<?php

namespace App\Interfaces;

interface StockPriceRepositoryInterface
{
    public function findBySymbol(string $symbol);
    public function findById(int $id);
    public function create(array $stockPrice);
    public function update(object $stockPrice, array $stockPriceArray);
}
