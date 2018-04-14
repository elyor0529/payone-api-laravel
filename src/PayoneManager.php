<?php

namespace Payone\Laravel;


use Illuminate\Contracts\Container\Container;

class PayoneManager
{
    /**
     * @var Container
     */
    protected $app;

    /**
     * MollieManager constructor.
     *
     * @param Container $app
     *
     * @return void
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * @return mixed
     */
    public function api()
    {
        return $this->app['payone.api.client'];
    }


}