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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'acorn_api' => [
        'base_url' => env('EXTERNAL_CATALOGUE_BASE_URL'),
        'tenancy_id' => env('EXTERNAL_CATALOGUE_TENANT_ID', 3),
        'api_key' => env('EXTERNAL_CATALOGUE_API_KEY'),
        'per_page' => env('EXTERNAL_CATALOGUE_PER_PAGE', 8),
        'external_catalogue_api_path' => '/local/acorn_coursemanagement/index.php/api/1.1/external_catalogue/',
    ],
];
