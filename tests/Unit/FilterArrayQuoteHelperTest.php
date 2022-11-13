<?php

namespace Tests\Unit;

use App\Helpers\FilterArrayQuoteHelper;
use PHPUnit\Framework\TestCase;

class FilterArrayQuoteHelperTest extends TestCase
{
    /** @test */
    public function test_filter_array_from_quote()
    {
        $arrayExample = [
            "avgTotalVolume" => 94754605,
            "calculationPrice" => "tops",
            "change" => 2.355,
            "changePercent" => 0.01603,
            "close" => null,
            "closeSource" => "official",
            "closeTime" => null,
            "companyName" => "Apple Inc",
            "currency" => "USD",
            "delayedPrice" => null,
            "delayedPriceTime" => null,
            "extendedChange" => null,
            "extendedChangePercent" => null,
            "extendedPrice" => null,
            "extendedPriceTime" => null,
            "high" => null,
            "highSource" => "IEX real time price",
            "highTime" => 1668190760625,
            "iexAskPrice" => 149.23,
            "iexAskSize" => 100,
            "iexBidPrice" => 149.22,
            "iexBidSize" => 400,
            "iexClose" => 149.225,
            "iexCloseTime" => 1668190790964,
            "iexLastUpdated" => 1668190790964,
            "iexMarketPercent" => 0.024294339172705046,
            "iexOpen" => 145.85,
            "iexOpenTime" => 1668177000513,
            "iexRealtimePrice" => 149.225,
            "iexRealtimeSize" => 100,
            "iexVolume" => 1251870,
            "lastTradeTime" => 1668190790964,
            "latestPrice" => 149.225,
            "latestSource" => "IEX real time price",
            "latestTime" => "1:19:50 PM",
            "latestUpdate" => 1668190790964,
            "latestVolume" => null,
            "marketCap" => 2373888908550,
            "primaryExchange" => "NASDAQ",
            "symbol" => "AAPL",
        ];

        $filter = (new FilterArrayQuoteHelper())->clear($arrayExample);

        $arrayFinal = [
            'symbol',
            'companyName',
            'latestPrice',
            'avgTotalVolume',
            'latestUpdate',
            'primaryExchange',
            'change',
            'currency',
            'marketCap'
        ];

        foreach($arrayFinal as $arrayFinalKey){
            $this->assertArrayHasKey($arrayFinalKey, $filter);
        }
    }
}
