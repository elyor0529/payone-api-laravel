<?php

namespace Payone\Laravel;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;
use Payone\PayoneClient;

class PayoneServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__ . '/../config/payone.php') => config_path('payone.php'),
        ]);

        $this->mergeConfigFrom(
            realpath(__DIR__ . '/../config/payone.php'), 'payone'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('payone.api.client', function ($app) {

            $client = new PayoneClient();

            $client->setApiEndpoint(config('payone.api_endpoint'))
                ->setApiVersion(config('payone.api_version'))
                ->setEncoding(config('payone.encoding'))
                ->setMid(config('payone.mid'))
                ->setAid(config('payone.aid'))
                ->setPortalId(config('payone.portalId'))
                ->setKey(config('payone.key'))
                ->setMode(config('payone.mode'));

            return $client;
        });

        $this->app->alias('payone.api.client', PayoneClient::class);


        $this->app->singleton('payone', function (Container $app) {
            return new PayoneManager($app);
        });

        $this->app->alias('payone', PayoneManager::class);
    }
}