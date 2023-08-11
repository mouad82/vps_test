<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for other micro-services such
    | as Master, Inventory, Website and more.
    |
    */

    'master' => [
        'domain' => env('MASTER_DOMAIN'),
        'endpoints' => [
            'user_rules' => env('MASTER_ENDPOINT_USER_RULES'),
        ]
    ],

];
