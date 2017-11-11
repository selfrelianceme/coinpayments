<?php

Route::post('coinpayments/cancel', 'Selfreliance\CoinPayments\CoinPayments@cancel_payment')->name('coinpayments.cancel');
Route::post('coinpayments/confirm', 'Selfreliance\CoinPayments\CoinPayments@validateIPNRequest')->name('coinpayments.confirm');
Route::post('coinpayments/webhookwithdraw', 'Selfreliance\CoinPayments\CoinPayments@check_transaction')->name('coinpayments.webhookwithdraw');