<?php

namespace App\Services;

use App\Http\Resources\StockPriceResource;
use App\Repositories\StockPriceRepository;

class StockPriceService
{
    /**
     * @var $stockPriceRepository
     */
    protected $stockPriceRepository;

    /**
     * StockPriceService constructor
     *
     * @param \App\Repositories\StockPriceRepository $stockPriceRepository
     */
    public function __construct(StockPriceRepository $stockPriceRepository)
    {
        $this->stockPriceRepository = $stockPriceRepository;
    }

    /**
     * Get information of Stock
     *
     * @param  string $symbol
     * @return \App\Http\Resources\StockPriceResource
     */
    public function getInformation(string $symbol)
    {
        $stockPrice = $this->stockPriceRepository->findBySymbol($symbol);

        if(!$stockPrice){
            // todo - implement API request & save in database
        }

        return StockPriceResource::collection($stockPrice);
    }
}
