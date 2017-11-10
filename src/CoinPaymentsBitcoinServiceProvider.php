<?php

namespace Selfreliance\CoinPaymentsBitcoin;
use Illuminate\Support\ServiceProvider;

class CoinPaymentsBitcoinServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__ . '/routes.php';
        $this->app->make('Selfreliance\CoinPaymentsBitcoin\CoinPaymentsBitcoin');

        $this->publishes([
            __DIR__.'/config/coinpayments_bitcoin.php' => config_path('coinpayments_bitcoin.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}