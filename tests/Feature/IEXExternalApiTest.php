<?php

namespace Tests\Feature;

use App\ExternalApis\IEXExternalApi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IEXExternalApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_third_party_api_request_quote_from_symbol()
    {
        $quoteResponse = (new IEXExternalApi())->getQuote('AAPL');
        $this->assertTrue(($quoteResponse->status() == 200) ? true : false);
    }

    /** @test */
    public function test_third_party_api_request_quote_from_wrong_symbol()
    {
        $quoteResponse = (new IEXExternalApi())->getQuote('AAPL1');
        $this->assertTrue(($quoteResponse->status() != 200) ? true : false);
    }
}
