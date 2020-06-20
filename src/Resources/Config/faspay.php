<?php

return [
    /**
     * ==========================================
     * Set Kredensial di file.env seperti berikut
     * ==========================================
     * 
     * Set true saat dalam Mode Development
     * Set false saat ke Mode Production
     */
    'isdev' => true,
    /**
     * Kredensial saat dalam Mode Development
     */
    'devcred' => [
        'merchantname' => env('FP_DEV_MERCHANT_NAME', 'OR JUST SET HERE'),
        'merchantid' => env('FP_DEV_MERCHANT_ID', 'OR JUST SET HERE'),
        'userid' => env('FP_DEV_USER_ID', 'OR JUST SET HERE'),
        'password' => env('FP_DEV_PASSWORD', 'OR JUST SET HERE'),
        'redirecturl' => env('FP_DEV_REDIRECT_URL', 'OR JUST SET HEREE')
    ],
    /**
     * Kredensial saat dalam Mode Production
     */
    'prodcred' => [
        'merchantname' => env('FP_PROD_MERCHANT_NAME', 'OR JUST SET HERE'),
        'merchantid' => env('FP_PROD_MERCHANT_ID', 'OR JUST SET HERE'),
        'userid' => env('FP_PROD_USER_ID', 'OR JUST SET HERE'),
        'password' => env('FP_PROD_PASSWORD', 'OR JUST SET HERE'),
        'redirecturl' => env('FP_PROD_REDIRECT_URL', 'OR JUST SET HEREE')
    ]
];
?>