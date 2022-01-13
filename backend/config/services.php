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

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_REDIRECT_URL')
    ],

//    'github_mobile_user' => [
//        'client_id' => env('USER_MOBILE_GITHUB_CLIENT_ID'),
//        'client_secret' => env('USER_MOBILE_GITHUB_CLIENT_SECRET'),
//        'redirect' => env('USER_MOBILE_GITHUB_REDIRECT_URL')
//    ],

//    'github_user_web' => [
//        'client_id' => env('USER_WEB_GITHUB_CLIENT_ID'),
//        'client_secret' => env('USER_WEB_GITHUB_CLIENT_SECRET'),
//        'redirect' => env('USER_WEB_GITHUB_REDIRECT_URL')
//    ],

//    'github_admin' => [
//        'client_id' => env('ADMIN_GITHUB_CLIENT_ID'),
//        'client_secret' => env('ADMIN_GITHUB_CLIENT_SECRET'),
//        'redirect' => env('ADMIN_GITHUB_REDIRECT')
//    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URL'),
    ],
];
