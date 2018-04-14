<?php

namespace Payone\Laravel\Facades;


use Illuminate\Support\Facades\Facade;

class Payone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'payone';
    }
}