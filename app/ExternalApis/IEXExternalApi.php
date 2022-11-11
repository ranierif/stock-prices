<?php

namespace App\ExternalApis;

use Illuminate\Support\Facades\Http;

class IEXExternalApi
{
    /**
     * IEXExternalApi constructor
     */
    public function __construct()
    {
        $this->api_token = config('services.IEX.api_token');
        $this->endpoint = 'https://cloud.iexapis.com/stable';
    }

    /**
     * Get quote from stock symbol
     *
     * @param  string $symbol
     * @return \Illuminate\Http\Client\Response
     */
    public function getQuote(string $symbol)
    {
        return Http::get("{$this->endpoint}/stock/{$symbol}/quote?token={$this->api_token}");
    }
}
