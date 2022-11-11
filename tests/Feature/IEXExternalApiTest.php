<?php

namespace Tests\Feature;

use App\ExternalApis\IEXExternalApi;
use Tests\TestCase;

class IEXExternalApiTest extends TestCase
{
    /** @test */
    public function test_third_party_api_request_quote_from_symbol()
    {
        $quoteResponse = (new IEXExternalApi())->getQuote('AAPL');
        $this->assertTrue(($quoteResponse->status() == 200) ? true : false);
    }
}
