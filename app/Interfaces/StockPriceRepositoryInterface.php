<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface StockPriceRepositoryInterface
{
    public function findBySymbol(string $symbol);
    public function findById(int $id);
    public function create(array $stockPrice);
    public function update(object $stockPrice, array $stockPriceArray);
}
