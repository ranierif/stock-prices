<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPrice extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'stock_prices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'symbol',
        'name',
        'latestPrice',
        'avgTotalVolume',
        'latestUpdate',
        'primaryExchange',
        'change',
        'currency',
        'marketCap'
    ];
}
