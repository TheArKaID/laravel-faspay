# laravel-faspay
Unofficial Laravel package for [Faspay Payment Gateway](https://faspay.co.id).

This Package is a conversion from [Faspay Api. PHP](https://github.com/hilmanshini/FaspayApI_PHP)

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


Publish the vendor then choose TheArKaID\LaravelFaspay
> php artisan vendor:publish


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
      $this->setDev(true); // true untuk Dev Mode, false untuk Production Mode
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
  // Use the following classes
  use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPayment;
  use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentRequestBillData;
  use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentRequestUserData;
  use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentRequestWrapper;

  // Define your payment channel,
  $paymentChannel['pg_code'] = "802";
  $paymentChannel['pg_name'] = "Mandiri Virtual Account";
  
  // Create an array for ordered Item
  $item = Array();
  $order = new FaspayPayment(
    "Item #1", // Product name
    1, // Quantity
    100000, // Amount
    1, // Payment Plan
    $faspayer->getConfig()->getUser()->getMerchantId(), // Merchant ID
    00 // Tenor
   );
  array_push($item, $order); // Push the item as order

  // Create Bill Data
  $billData = FaspayPaymentRequestBillData::managed(
    "123456789", // Billing Number
    "Pembayaran X", // Billing Description
    2, // Expired Day Interval
    "100000", // Bill Total, don't add '.' or ','m only number
    $item, // Item
    FaspayPaymentRequestBillData::PAY_TYPE_MIXED // Pay Type
  );

    // Create User Data
  $userData = new FaspayPaymentRequestUserData(
    "087123123123", // Phone Number
    "arka.progammer@gmail.com", // Email
    FaspayPaymentRequestWrapper::TERMINAL_MOBILE_APP_ANDROID, // Terminal
    "1234", // Customer No
    "Arifia" // Customer Name
  );

  // Proccess the request and return the result.
  return $faspayer->createPayment($item, $paymentChannel);
```

4. Checking Payment Status

```php
  // Proccess the request and return the result.
  return $faspayer->checkPaymentStatus(
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
    $paymentcancel
   );
```

6. Notification

When users accept or cancel payment, notification of payment status sent to your server. 

```php
  // Get the notification
  return $faspayer->notifier();
```

### References
There are informations in Faspay that could help you understanding terms in this package
- [Faspay Business Documentation](https://faspay.co.id/docs/index-business.html#faspay-business)
- [Faspay Simulator](https://dev.faspay.co.id/simulator)
