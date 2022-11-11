<?php

namespace Tests\Feature;

use App\Models\StockPrice;
use App\Services\StockPriceService;
use Tests\TestCase;

class StockPriceServiceTest extends TestCase
{
    /** @test */
    public function test_if_service_get_information_and_save_in_database()
    {
        $stockPrice = app(StockPriceService::class)->getInformation('AAPL');
        $this->assertTrue(($stockPrice instanceof StockPrice) ? true : false);
    }
}
