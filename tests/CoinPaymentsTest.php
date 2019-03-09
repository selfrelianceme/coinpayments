<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery;
use Selfreliance\BitGo\BitGo;
use Selfreliance\CoinPayments\CoinPayments;
use Selfreliance\PayKassa\PayKassa;
use Tests\TestCase;
use Config;
use Carbon\Carbon;
use Selfreliance\PayKassa\Events\PayKassaPaymentIncome;
class CoinPaymentsTest extends TestCase
{
    use DatabaseMigrations;

    public function testBalance()
    {
        $coinpayments = new CoinPayments();
        $balance = $coinpayments->balance('eth');
    }

    public function testForm(){
        $coinpayments = new CoinPayments();
        $coinpayments->memo = 'payment 1';
        $res_form = $coinpayments->form(1, 0.003, 'eth');
        dd($res_form);
    }

    public function testValidPayment(){
        $sci = Mockery::mock(\Selfreliance\PayKassa\PayKassaSCI::class, function ($mock) {
            return $mock->shouldReceive('sci_confirm_order')->andReturn([
                'error' => false,
                'data' => [
                    'amount' => 0.0385,
                    'currency' => 'ETH',
                    'order_id' => 1,
                    'transaction' => str_random(32),
                ]
            ]);
        });

        $resp = new PayKassa(null, $sci);
        $res = $resp->check_transaction([
            'private_hash' => str_random('check')
        ]);
    }

    public function testSendMoney(){
        $resp = new PayKassa(null, null);
        $resp = $resp->send_money(1,1,'0x', 'ETH', 'ethereum');
        dd($resp);
    }
}