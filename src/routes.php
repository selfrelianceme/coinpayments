<?php

Route::post('coinpayments_bitcoin/cancel', 'Selfreliance\CoinPaymentsBitcoin\CoinPaymentsBitcoin@cancel_payment')->name('coinpayments_bitcoin.cancel');
Route::post('coinpayments_bitcoin/confirm', 'Selfreliance\CoinPaymentsBitcoin\CoinPaymentsBitcoin@check_transaction')->name('coinpayments_bitcoin.confirm');