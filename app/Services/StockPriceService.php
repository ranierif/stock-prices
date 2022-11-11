<?php

namespace App\Services;

use App\Repositories\StockPriceRepository;

class StockPriceService
{
    /**
     * @var $stockPriceRepository
     */
    protected $stockPriceRepository;

    /**
     * ArtistService constructor
     *
     * @param \App\Repositories\StockPriceRepository $stockPriceRepository
     */
    public function __construct(StockPriceRepository $stockPriceRepository)
    {
        $this->stockPriceRepository = $stockPriceRepository;
    }
}
