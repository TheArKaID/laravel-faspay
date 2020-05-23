<?php

namespace TheArKaID\LaravelFaspay\Debit;

abstract class FaspayConfigs {

    abstract public function getPaymentChannelUrl();

    abstract public function getCreateBillingUrl();

    abstract public function getInquiryPaymentStatusUrl();

    abstract public function getCancelTransactionUrl();

    protected $user;

    function __construct(FaspayUser $faspayuser) {
        $this->user = $faspayuser;
    }
    
    public function getUser() {
        return $this->user;
    }



}
