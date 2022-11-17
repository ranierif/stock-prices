<?php

namespace App\Services;

use App\ExternalApis\IEXExternalApi;
use App\Helpers\FilterArrayQuoteHelper;
use App\Repositories\StockPriceRepository;

class StockPriceService
{
    /**
     * @var $stockPriceRepository
     * @var $IEXExternalApi
     */
    protected $stockPriceRepository;
    protected $IEXExternalApi;

    /**
     * StockPriceService constructor
     *
     * @param \App\Repositories\StockPriceRepository $stockPriceRepository
     * @param \App\ExternalApis\IEXExternalApi $IEXExternalApi
     */
    public function __construct(StockPriceRepository $stockPriceRepository, IEXExternalApi $IEXExternalApi)
    {
        $this->stockPriceRepository = $stockPriceRepository;
        $this->IEXExternalApi = $IEXExternalApi;
    }

    /**
     * Get information of Stock
     *
     * @param  string $symbol
     * @return \App\Models\StockPrice
     *
     * @throws \Exception
     */
    public function getInformation(string $symbol)
    {
        $stockPrice = $this->stockPriceRepository->findBySymbol($symbol);

        if (!$stockPrice || $stockPrice && $stockPrice->lastUpdate != $stockPrice->updated_at) {
            try {
                $quoteUpdated = $this->getUpdatedQuote($symbol);
                $data = (new FilterArrayQuoteHelper())->clear($quoteUpdated);

                if (!$stockPrice) {
                    $stockPrice = $this->stockPriceRepository->create($data);
                } else {
                    $this->stockPriceRepository->update($stockPrice, $data);
                    $stockPrice->fresh();
                }
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        }

        return $stockPrice;
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
        try {
            $quoteResponse = $this->IEXExternalApi->getQuote($symbol);
            return $quoteResponse;
        } catch(\Exception $e) {
            throw new \Exception(__('Não foi possível encontrar a ação informada.'));
        }
    }
}
