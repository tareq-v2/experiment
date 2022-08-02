<?php

return [

    // 'facebook' => [
    //     'client_id' => '598575891651975',
    //     'client_secret' => '1f7b4a440fc5247969b348d18e202947',
    //     'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback',
    // ],
    'google' => [
        'client_id' => '725102962027-l4qbrij0l4m4skn8ika3nkbpg51emptf.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

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

];
