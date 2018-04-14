<?php

namespace Payone\Laravel\Fascades;


use Illuminate\Support\Facades\Facade;

class Payone extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'payone';
    }
}