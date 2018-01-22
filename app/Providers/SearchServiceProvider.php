<?php

namespace App\Providers;

use App\Foundation\Repositories\BusStopRepository;
use App\Foundation\Services\BusApiService;
use App\Foundation\Services\SearchService;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SearchService::class, function () {
            return new SearchService(
                app(BusApiService::class),
                app(BusStopRepository::class)
            );
        });
    }
}
