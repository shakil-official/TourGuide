<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
    'client_id' => '405979619358-glrbfg7jigref5m5j91vpv1tf20rb5fd.apps.googleusercontent.com',
    'client_secret' => 'GpuKMbIvP_ayfBhNQBd26oT9',
    'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
    // 'apixu' => [
    // 'client_id' => 'cc4d6b0958c3499b98d125635171612',
    // 'client_secret' => 'cc4d6b0958c3499b98d125635171612',
    // 'redirect' => 'http://api.apixu.com/v1/current.json?key=81c142c52bfc40fab61125614171612&q=',
    // ],

    'facebook' => [
    'client_id' => '559199644422910',
    'client_secret' => '5c095693f8113a883ba37d5b2902e591',
    'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

];
