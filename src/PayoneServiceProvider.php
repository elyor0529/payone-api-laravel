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

            $client->setApiEndpoint($app['config']['api_endpoint'])
                ->setApiVersion($app['config']['api_version'])
                ->setEncoding($app['config']['encoding'])
                ->setMid($app['config']['mid'])
                ->setAid($app['config']['aid'])
                ->setPortalId($app['config']['portalId'])
                ->setKey($app['config']['key'])
                ->setMode($app['config']['mode']);

            return $client;
        });

        $this->app->alias('payone.api.client', PayoneClient::class);


        $this->app->singleton('payone', function (Container $app) {
            return new PayoneManager($app);
        });

        $this->app->alias('payone', PayoneManager::class);
    }
}