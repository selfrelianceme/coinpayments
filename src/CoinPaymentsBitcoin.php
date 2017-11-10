<?php

namespace Selfreliance\CoinPaymentsBitcoin;

use Illuminate\Http\Request;
use Config;
use Route;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Selfreliance\CoinPaymentsBitcoin\Events\CoinPaymentsBitcoinPaymentIncome;
use Selfreliance\CoinPaymentsBitcoin\Events\CoinPaymentsBitcoinPaymentCancel;

use Selfreliance\CoinPaymentsBitcoin\CoinPaymentsBitcoinInterface;
use CoinPayments\CoinPaymentsAPI;

class CoinPaymentsBitcoin implements CoinPaymentsBitcoinInterface
{
	use ValidatesRequests;
	private $cps;
	private $unit = 'BTC';
	function __construct(){
		$this->cps = new CoinPaymentsAPI();
		$this->cps->Setup(Config::get('coinpayments_bitcoin.private_key'), Config::get('coinpayments_bitcoin.public_key'));
	}

	public function balance(){
		$result = $this->cps->GetBalances(true);
		if ($result['error'] != 'ok'){
			throw new \Exception($result['error']);			
		}
		return $result['result'][$this->unit]['balancef'];
	}

	public function form($payment_id, $sum){
		$req = [
			'amount'    => $sum,
			'currency1' => $this->unit,
			'currency2' => $this->unit,
			'item_name' => 'Order '.$payment_id,
			'item_number' => $payment_id,
			'ipn_url' => Route('coinpayments_bitcoin.confirm')

		];
		$result = $this->cps->CreateTransaction($req);

		if ($result['error'] != 'ok'){
			throw new \Exception($result['error']);			
		}
		$PassData = new \stdClass();
		$PassData->address = $result['result']['address'];
		$PassData->another_site = false;
		return $PassData;

	}

	public function check_transaction($request){
		
	}

	public function send_money($data){
		$amount = 1;
		$currency = $this->unit;
		$address = '1N1WGyj2nebJUJv1q7VeD2FDTNQcbmcQ6W';
		$auto_confirm = true;
		$ipn_url = '';
		$result = $this->cps->CreateWithdrawal($amount, $currency, $address, $auto_confirm, $ipn_url);
		if ($result['error'] != 'ok'){
			throw new \Exception($result['error']);			
		}
		dd($result);
	}

	public function cancel_payment(Request $request){
		
	}
}