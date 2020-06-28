# laravel-faspay
Unofficial Laravel package for [Faspay Payment Gateway](https://faspay.co.id).

This Package is a conversion from [Faspay Api. PHP](https://github.com/faspay-team/Sdk-PHP-Faspay).


Tested on: 
[![Laravel 5.5](https://img.shields.io/badge/Laravel-5.5-orange.svg)](https://laravel.com/docs/5.5) [![Laravel 7.x](https://img.shields.io/badge/Laravel-7.x-red.svg)](https://laravel.com)
[![Latest Stable Version](https://poser.pugx.org/TheArKaID/laravel-faspay/v/stable)](https://packagist.org/packages/TheArKaID/laravel-faspay) [![Total Downloads](https://poser.pugx.org/TheArKaID/laravel-faspay/downloads.png)](https://packagist.org/packages/TheArKaID/laravel-faspay) [![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/TheArKaID/laravel-faspay)

- [x] Faspay Business Debit
- [ ] Faspay Business Credit

## Features
- Getting Payment Channel
- Creating Payment
- Checking Payment Status
- Cancelling Payment
- Notification

## Installation
You can install the package via composer:
```
composer require thearkaid/laravel-faspay
```

Publish faspay.php configuration
```
php artisan vendor:publish --provider='TheArKaID\LaravelFaspay\Providers\LaravelFaspayServiceProvider'
```


## How to Use
0. Update faspay.php Configuration in your config directory,

```php
  /**
   * Set true saat dalam Mode Development
   * Set false saat ke Mode Production
   */
  'isdev' => true,
  // Kredensial saat dalam Mode Development
  'devcred' => [
      'merchantname' => env('FP_DEV_MERCHANT_NAME', 'OR JUST SET HERE'),
      'merchantid' => env('FP_DEV_MERCHANT_ID', 'OR JUST SET HERE'),
      'userid' => env('FP_DEV_USER_ID', 'OR JUST SET HERE'),
      'password' => env('FP_DEV_PASSWORD', 'OR JUST SET HERE'),
      'redirecturl' => env('FP_DEV_REDIRECT_URL', 'OR JUST SET HERE')
  ],
  // Kredensial saat dalam Mode Production
  'prodcred' => [
      'merchantname' => env('FP_PROD_MERCHANT_NAME', 'OR JUST SET HERE'),
      'merchantid' => env('FP_PROD_MERCHANT_ID', 'OR JUST SET HERE'),
      'userid' => env('FP_PROD_USER_ID', 'OR JUST SET HERE'),
      'password' => env('FP_PROD_PASSWORD', 'OR JUST SET HERE'),
      'redirecturl' => env('FP_PROD_REDIRECT_URL', 'OR JUST SET HERE')
  ]
```

1. Alway Use and Create LaravelFaspay Class

```php
  // Require LaravelFaspay class
  use TheArKaID\LaravelFaspay\LaravelFaspay;

  // Create an object from LaravelFaspay Class
  $faspayer = new LaravelFaspay();
```

2. Getting Payment Channel

```php
  // Return Payment Channel here
  return $faspayer->getPaymentChannel();
```

3. Creating Payment

```php
  // Define your payment channel,
  $paymentChannel['pg_code'] = "802";
  $paymentChannel['pg_name'] = "Mandiri Virtual Account";
    
  // Create an array for ordered Item
  $item = Array();
  $order["product"] = "Item #1"; // Product Name
  $order["qty"] = 1; // QTY
  $order["amount"] = 100000; // Price. Just the real price, without any '.'(dot) or ',' (comma).
  $order["paymentplan"] = 1; // Payment Plan. See References below.
  $order["merchantid"] = $faspayer->getConfig()->getUser()->getMerchantId(); // Merchant ID
  $order["tenor"] = 00; // Tenor. See References below.
  array_push($item, $order); // Push order,
  // Loop or push again for more than 1 items.

  // Create Bill Data
  $billData["billno"] = "1232123"; // Bill Number
  $billData["billdesc"] = "Pembayaran RHI"; // Billing Description
  $billData["billexp"] = 2; // Expired Day Interval (in total days)
  $billData["billtotal"] = 10000; // Bill Total, Just the real bill, without any '.'(dot) or ',' (comma).
  $billData["paytype"] = 3 // Pay Type. See References below.

    // Create User Data
  $userData["phone"] = "087123123123"; // Phone Number
  $userData["email"] = "arka.progammer@gmail.com"; // Email
  $userData["terminal"] = 21; // Terminal
  $userData["custno"] = "12345"; // Customer No
  $userData["custname"] = "thearka"; // Customer Name

  // Proccess the request and return the result.
  return $faspayer->createPayment($item, $paymentChannel, $billData, $userData);
```

4. Checking Payment Status

```php
  // Proccess the request and return the result.
  return $faspayer->checkPaymentStatus(
    $reqdesc, // Request Description
    $trx_id, // Transaction ID
    $billno // Billing Number
   );
```

5. Cancelling Payment

```php
  // Proccess the request and return the result.
  return $faspayer->cancelPayment(
    $trx_id, // Transaction ID
    $billno, // Billing Number
    $paymentcancel // Description for Cancellation
   );
```

6. Notification

When users accept or cancel payment, notification of payment status sent to your server. Don't forget to return this data to the screen, as response to Faspay that their request accepted in your server

```php
  // Get the notification.
  return $faspayer->notifier();

  // The Data returned. Take the trx_id and response_code for updating your data status. 
  // Success.
  {
    "response": "Payment Notification",
    "response_date": "2020-06-28 17:06:26",
    "trx_id": "1234567890", // Transaction ID/Bill Number
    "merchant_id": "12345", // Merchant ID
    "merchant": "TheArKa", // Merchant Name
    "response_code": "00",
    "response_desc": "Sukses"
  }

  // Failed
  {
    "response": "Payment Notification",
    "response_date": "2020-06-28 17:06:15",
    "trx_id": "1234567890", // Transaction ID/Bill Number
    "merchant_id": "12345", // Merchant ID
    "merchant": "TheArKa", // Merchant Name
    "response_code": "01",
    "response_desc": "Gagal"
  }
```

### References
There are informations in Faspay that could help you understanding terms in this package
- [Faspay Business Documentation](https://faspay.co.id/docs/index-business.html#faspay-business)
- [Faspay Simulator](https://dev.faspay.co.id/simulator)
