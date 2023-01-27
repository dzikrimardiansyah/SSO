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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'azure' => [    
        'client_id' => env('AZURE_CLIENT_ID','2e646319-353a-419e-b3d4-4028959479b4'),
        'client_secret' => env('AZURE_CLIENT_SECRET','V3y8Q~4x91s2EkhG2WveNjN~.0W3CXFtiKCIPceg'),
        'redirect' => env('AZURE_REDIRECT_URI','http://localhost:8000/auth/azure/callback'),
        'tenant' => env('AZURE_TENANT_ID','7b892841-07db-4bfa-85e2-217e5585715d'),
        'proxy' => env('PROXY')  // optionally
      ],

];
