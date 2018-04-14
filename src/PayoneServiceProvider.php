<?php

namespace Payone\Laravel;

use Payone\PayoneClient;

class PayoneServiceProvider
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
        $this->app->singleton('payone', function () {

            $client = new PayoneClient();

            $client->setMid(1234)
                ->setPortalId(1234)
                ->setAid(1234)
                ->setKey('1234');

            return $client;
        });

        $this->app->alias('payone', PayoneClient::class);
    }
}