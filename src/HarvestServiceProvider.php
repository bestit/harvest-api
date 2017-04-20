<?php

namespace BestIt\Harvest;

use Illuminate\Support\ServiceProvider;

/**
 * Class HarvestServiceProvider
 *
 * @package BestIt\Harvest
 */
class HarvestServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/harvest.php' => config_path('harvest.php')
        ], 'harvest');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('harvest', function () {
            return new Client(
                config('harvest.server_url'),
                config('harvest.username'),
                config('harvest.password'),
                config('harvest.guzzle_options')
            );
        });
    }
}
