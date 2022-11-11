<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface StockPriceRepositoryInterface
{
    public function findBySymbol(string $symbol);
    public function create(array $stockPrice);
}
