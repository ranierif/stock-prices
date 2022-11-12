<?php

namespace Tests\Feature;

use App\Http\Livewire\ShowStockPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ShowStockPriceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_show_stock_price_view()
    {
        $response = $this->get(route('home'));
        $response->assertViewIs('home');
    }

    /** @test */
    public function test_show_stock_price_form()
    {
        $request = [
            'symbol' => 'AAPL',
        ];

        Livewire::test(ShowStockPrice::class)
            ->set('symbol', $request['symbol'])
            ->call('submit');

        $this->assertDatabaseHas('stock_prices', $request);
    }
}
