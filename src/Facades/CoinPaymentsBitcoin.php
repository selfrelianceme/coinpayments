<?php 
namespace Selfreliance\CoinPaymentsBitcoin\Facades;  

use Illuminate\Support\Facades\Facade;  

class CoinPaymentsBitcoin extends Facade 
{
	protected static function getFacadeAccessor() { 
		return 'coinpaymentsbitcoin';   
	}
}
