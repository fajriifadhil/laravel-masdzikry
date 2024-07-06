<?php

return [
    'serverKey' => env('MIDTRANS_SERVER_KEY'),
    'clientKey' => env('MIDTRANS_CLIENT_KEY'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', true), // Set to true for production environment
    'is_sanitized' => true,
    'is_3ds' => true,
    // Optional configurations
    'append_notif_url' => null,
    'overrideNotifUrl' => null,
    'payment_idempotency_key' => null,
    'curl_options' => null,
];
