<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '990982572147983',
        'client_secret' => '5818c4eda903ab80fb0f8b5118162806',
        'redirect' => 'https://www.bookbank.com.np/login/facebook/callback',
    ],


    'google' => [
        'client_id' => '980388736253-ugsrd93ltr2hmc2242nu7nfohhks8dg5.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://www.bookbank.com.np/login/google/callback',
    ],

    // 'google' => [
    //     'client_id' => '980388736253-tglmdearml2niku3frimu4dvtec8h0ns.apps.googleusercontent.com',
    //     'client_secret' => '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',
    //     'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    // ],
];
