<?php

namespace App\Providers;

use App\Foundation\Services\BusApiService;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
use \App\Foundation\Requests\RequestManager;

class MyTransportSGProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BusApiService::class, function () {
            return new BusApiService(
                new Client(),
                app(RequestManager::class)
            );
        });
    }
}
