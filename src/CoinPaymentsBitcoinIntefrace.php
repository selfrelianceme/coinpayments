<?php
namespace Selfreliance\CoinPaymentsBitcoin;
use Illuminate\Http\Request;
interface CoinPaymentsBitcoinInterface {
   public function balance();
   public function form($payment_id, $amount);
   public function check_transaction($data);
   public function send_money($data);
   public function cancel_payment(Request $request);
}