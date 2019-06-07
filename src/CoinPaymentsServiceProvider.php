<?php

namespace Selfreliance\CoinPayments;
use Illuminate\Support\ServiceProvider;

class CoinPaymentsServiceProvider extends ServiceProvider
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
        $this->app->make('Selfreliance\CoinPayments\CoinPayments');

        $this->publishes([
            __DIR__.'/config/coinpayments.php' => config_path('coinpayments.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/coinpayments.php', 'coinpayments'
        );

        $this->app->bind(CoinPayments::class, function () {
            return new CoinPayments();
        });

        $this->app->alias(CoinPayments::class, 'payment.coinpayments');
    }
}