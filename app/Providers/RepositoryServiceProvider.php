<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected array $repositories = [
        'App\Interfaces\BaseInterface' => 'App\Repositories\BaseRepository'
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach($this->repositories as $interface => $implementation){
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
