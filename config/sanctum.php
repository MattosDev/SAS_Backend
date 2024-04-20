<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Stateful Domains
    |--------------------------------------------------------------------------
    |
    | Requests from the following domains / hosts will receive stateful API
    | authentication cookies. Typically, these should include your local
    | and production domains which access your API via a frontend SPA.
    |
    */

    'stateful' => explode(',', env(
        'SANCTUM_STATEFUL_DOMAINS',
        'localhost,localhost:3000,localhost:8000,127.0.0.1,127.0.0.1:8000,::1'
    )),

    /*
    |--------------------------------------------------------------------------
    | Expiration Minutes
    |--------------------------------------------------------------------------
    |
    | This value controls the number of minutes until an issued token will be
    | considered expired. If this value is null, personal access tokens do
    | not expire. This won't tweak the lifetime of first-party sessions.
    |
    */

    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Sanctum token authentication
    | request to your application. Feel free to modify this array as you
    | wish, but ensure that you keep the "auth:sanctum" middleware!
    |
    */

    'middleware' => ['auth:sanctum'],

    /*
    |--------------------------------------------------------------------------
    | Prefix
    |--------------------------------------------------------------------------
    |
    | This value defines the URI prefix that will be used to access the token
    | authentication routes. You may change this value as required, but
    | don't forget to update the corresponding client-side configuration.
    |
    */

    'prefix' => 'api',

    /*
    |--------------------------------------------------------------------------
    | Personal Access Tokens
    |--------------------------------------------------------------------------
    |
    | This array of keys will be used to identify the user's current stateful
    | API token on incoming requests that are properly authenticated. Feel
    | free to modify this value to anything you like or simply keep it.
    |
    */

    'has_api_token' => [
        'middleware' => ['auth:sanctum'],
    ],

];
