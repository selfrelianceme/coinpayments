# CoinPayments

Require this package with composer:
```
composer require selfreliance/coinpayments
```
## Publish Config

```
php artisan vendor:publish --provider="Selfreliance\CoinPayments\CoinPaymentsServiceProvider"
```

## Use name module

```
use Selfreliance\CoinPayments\CoinPayments;
```
or
```
$pm = resolve('payment.perfectmoney');
```


## Configuration

Add to **.env** file:

```
#CoinPayments_Settings
CP_PUBLIC_KEY=
CP_PRIVATE_KEY=
CP_MERCHANT_ID=
CP_IPN_SECRET=
```