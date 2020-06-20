<?php

namespace TheArKaID\LaravelFaspay;

use TheArKaID\LaravelFaspay\Debit\FaspayUser;

class User extends FaspayUser{
    function __construct($mode) {
        $mode = ($mode===true) ? '.devcred.' : '.prodcred.';
        $this->setMerchantName(config('faspay' .$mode. 'merchantname'));
        $this->setMerchantId(config('faspay' .$mode. 'merchantid'));
        $this->setUserId(config('faspay' .$mode. 'userid'));
        $this->setPassword(config('faspay' .$mode. 'password'));
        $this->setRedirectUrl(config('faspay' .$mode. 'redirecturl'));
    }
}

?>