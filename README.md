# laravel-faspay
Unofficial Laravel package for [Faspay Payment Gateway](https://faspay.co.id).

This Package is a conversion from [Faspay Api. PHP](https://github.com/faspay-team/Sdk-PHP-Faspay).

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
> composer require thearkaid/laravel-faspay


## How to Use
0. Update faspay.php Configuration in your config directory,

```php
  class faspay extends FaspayUser{
    function __construct() {
      $this->setMerchantName("SINTESA");
      $this->setMerchantId("32254");
      $this->setUserId("bot32254");
      $this->setPassword("p@ssw0rd");
      $this->setRedirectUrl("https://faspay.co.id");
      $this->setDev(true); // true for Dev Mode, false for Production Mode
    }
  }
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
  $billData["billtotal"] = "10000"; // Bill Total, Just the real bill, without any '.'(dot) or ',' (comma).
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

When users accept or cancel payment, notification of payment status sent to your server. 

When creating this one, tell to the Faspay Team which one would you use, JSON or XML, so they can send that data, and you can choose to use notifier() for JSON or notifierXML() for XML data.

```php
  // Get the notification for JSON
  return $faspayer->notifier();

  // Get the notification fo XML
  return $faspayer->notifierXML();
```

### References
There are informations in Faspay that could help you understanding terms in this package
- [Faspay Business Documentation](https://faspay.co.id/docs/index-business.html#faspay-business)
- [Faspay Simulator](https://dev.faspay.co.id/simulator)
