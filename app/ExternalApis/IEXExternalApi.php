<?php

namespace App\ExternalApis;

use App\Exceptions\IEXExternalApiException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class IEXExternalApi
{
    /**
     * @var $client
     */
    protected $client;

    /**
     * IEXExternalApi constructor
     */
    public function __construct(Client $client)
    {
        $this->api_token = config('services.IEX.api_token');
        $this->client = $client;
    }

    /**
     * Get quote from stock symbol
     *
     * @param  string $symbol
     * @return \GuzzleHttp\Psr7\Response
     * @throws \Exception
     */
    public function getQuote(string $symbol)
    {
        try {
            $response = $this->client->request("GET", "stock/{$symbol}/quote", [
                "query" => [
                    "token" => $this->api_token
                ]
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $e) {
            $this->throwException(sprintf('Failed to get quote for "%s".', $symbol));
        }
    }

    /**
     * Throw Exception
     *
     * @param  string $message
     * @param  int $code
     * @return \Application\Exception\IEXExternalApiException
     */
    private function throwException($message, $code = 400)
    {
        throw new IEXExternalApiException($message, $code);
    }
}
