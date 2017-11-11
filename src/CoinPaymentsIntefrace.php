<?php
namespace Selfreliance\CoinPayments;
use Illuminate\Http\Request;
interface CoinPaymentsInterface {
   public function balance();
   public function form($payment_id, $amount, $units);
   public function check_transaction($data);
   public function send_money($payment_id, $amount, $address, $currency);
   public function cancel_payment(Request $request);
}