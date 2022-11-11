<?php

namespace App\Services;

use App\ExternalApis\IEXExternalApi;
use App\Http\Resources\StockPriceResource;
use App\Repositories\StockPriceRepository;
use Illuminate\Support\Arr;

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

        if(!$stockPrice || $stockPrice && $stockPrice->lastUpdate != $stockPrice->updated_at){
            try {
                $quoteUpdated = $this->getUpdatedQuote($symbol);
                $data = $this->filterDataFromQuote($quoteUpdated);

                if($stockPrice){
                    $this->stockPriceRepository->update($stockPrice, $data);
                    $stockPrice->fresh();
                } else {
                    $stockPrice = $this->stockPriceRepository->create($data);
                }
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        }

        return $stockPrice;
    }

    public function createStockPrice(array $array)
    {

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

        if($quoteResponse->status() != 200){
            throw new \Exception(__('Não foi possível encontrar a ação informada.'));
        }

        return $quoteResponse->json();
    }

    /**
     * Filter data from quote
     *
     * @param  array $quote
     * @return array
     */
    public function filterDataFromQuote(array $quote)
    {
        $data = Arr::only($quote, array(
            'symbol',
            'companyName',
            'latestPrice',
            'avgTotalVolume',
            'latestUpdate',
            'primaryExchange',
            'change',
            'currency',
            'marketCap')
        );

        Arr::set($data, 'latestUpdate', date('Y-m-d H:i:s', $data['latestUpdate'] / 1000));

        return $data;
    }
}
