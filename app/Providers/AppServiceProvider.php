<?php

namespace App\Providers;

use App\ExternalApis\IEXExternalApi;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IEXExternalApi::class, function () {
            return new IEXExternalApi(new Client([
                'base_uri' => config('services.IEX.api_endpoint'),
            ]));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
