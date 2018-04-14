<?php

return [
    'mid'          => env('PAYONE_MID'),
    'portalId'     => env('PAYONE_PORTAL_ID'),
    'aid'          => env('PAYONE_AID'),
    'key'          => env('PAYONE_KEY'),
    'api_endpoint' => env('PAYONE_API_ENDPOINT', 'https://api.pay1.de/post-gateway/'),
    'api_version'  => env('PAYONE_API_VERSION', '3.10'),
    'encoding'     => env('PAYONE_ENCODING', 'UTF-8'),
    'mode'         => env('PAYONE_MODE', 'test'),
];