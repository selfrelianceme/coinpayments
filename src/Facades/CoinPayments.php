<?php 
namespace Selfreliance\CoinPayments\Facades;  

use Illuminate\Support\Facades\Facade;  

class CoinPayments extends Facade 
{
	protected static function getFacadeAccessor() { 
		return 'coinpayments';   
	}
}
