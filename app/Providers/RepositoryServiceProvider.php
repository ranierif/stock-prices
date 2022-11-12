<?php

namespace App\Providers;

use App\Repositories\Interfaces\StockPriceRepositoryInterface;
use App\Repositories\StockPriceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            StockPriceRepositoryInterface::class,
            StockPriceRepository::class
        );
    }
}
