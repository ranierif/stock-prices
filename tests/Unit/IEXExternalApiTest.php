<?php

namespace Tests\Unit;

use App\ExternalApis\IEXExternalApi;
use App\Exceptions\IEXExternalApiException;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class IEXExternalApiTest extends TestCase
{
    /** @test */
    public function test_should_throw_exception_for_empty_symbol_argument()
    {
        $this->expectException(IEXExternalApiException::class);
        $this->expectExceptionCode(400);

        $quote = $this->getQuote(400);
        $quote->getQuote('');
    }

    /** @test */
    public function test_should_throw_exception_for_invalid_symbol_argument()
    {
        $symbol = 'INVALID';

        $this->expectException(IEXExternalApiException::class);
        $this->expectExceptionMessage(sprintf('Failed to get quote for "%s".', $symbol));
        $this->expectExceptionCode(400);

        $quote = $this->getQuote(400);

        $quote->getQuote($symbol);
    }

    /** @test */
    public function test_should_return_quote_data()
    {
        $body = file_get_contents(__DIR__.'/Mock/IEXExternalApi/response-body.txt');

        $quote = $this->getQuote(200, $body);
        $result = $quote->getQuote('AAPL');

        $this->assertEquals(json_decode($body, true), $result);
    }

    /** @test */
    private function getQuote($status, $body = null)
    {
        $mock = new MockHandler([new Response($status, [], $body)]);
        $handler = HandlerStack::create($mock);
        $client = new Client(
            [
            'handler' => $handler,
            'base_uri' => 'http://mocked.iexcloud.xyz']
        );

        return new IEXExternalApi($client);
    }
}
