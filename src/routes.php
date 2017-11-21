<?php

Route::post('coinpayments/cancel', 'Selfreliance\CoinPayments\CoinPayments@cancel_payment')->name('coinpayments.cancel');
Route::post('coinpayments/confirm', 'Selfreliance\CoinPayments\CoinPayments@validateIPNRequest')->name('coinpayments.confirm');
Route::get('coinpayments/webhookwithdraw', 'Selfreliance\CoinPayments\CoinPayments@webhookwithdraw')->name('coinpayments.webhookwithdraw');