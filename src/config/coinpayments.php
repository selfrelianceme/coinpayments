<?php
return [
    /**
     * CoinPayment public key
     * https://www.coinpayments.net/acct-api-keys
     */
	'public_key'  => env('CP_PUBLIC_KEY', 'cp_public_key'),

    /**
     * Generate address for client or go to merchant
     */
    'use_merchant' => env('CP_USE_MERCHANT', false),

    /**
     * CoinPayments private key
     * https://www.coinpayments.net/acct-api-keys
     */
	'private_key' => env('CP_PRIVATE_KEY','cp_private_key'),

    /**
     * CoinPayments merchant ID
     * https://www.coinpayments.net/acct-settings
     */
	'merchant_id' => env('CP_MERCHANT_ID','cp_merchant_id'),

    /**
     * CoinPayments ipn secret
     * https://www.coinpayments.net/acct-settings
     */
	'ipn_secret'  => env('CP_IPN_SECRET','cp_ipn_secret')
];