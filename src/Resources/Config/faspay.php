<?php

namespace TheArKaID\LaravelFaspay;

use TheArKaID\LaravelFaspay\Debit\FaspayUser;

class faspay extends FaspayUser{
    function __construct() {
        $this->setMerchantName("Nama Merchan");
        $this->setMerchantId("ID Merchant");
        $this->setUserId("User");
        $this->setPassword("Password");
        $this->setRedirectUrl("https://faspay.co.id");
        $this->setDev(true); // true untuk Dev Mode, false untuk Production Mode
    }
}