<?php

namespace App\Services;

use App\ExternalApis\IEXExternalApi;
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
     *
     * @throws \Exception
     */
    public function getInformation(string $symbol)
    {
        $stockPrice = $this->stockPriceRepository->findBySymbol($symbol);

        if(!$stockPrice){
            try {
                $quoteUpdated = $this->getUpdatedQuote($symbol);
                $stockPrice = $this->stockPriceRepository->create($quoteUpdated->json());
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }

        return StockPriceResource::collection($stockPrice);
    }

    /**
     * Get updated quote by symbol from IEX Api
     *
     * @param  string $symbol
     * @return array
     *
     * @throws \Exception
     */
    public function getUpdatedQuote(string $symbol)
    {
        $quoteResponse = (new IEXExternalApi())->getQuote($symbol);

        if($quoteResponse->status != 200){
            throw new \Exception(__('Não foi possível encontrar a ação informada.'));
        }

        return $quoteResponse;
    }
}
