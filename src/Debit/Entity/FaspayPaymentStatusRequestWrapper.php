<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity;

use TheArKaID\LaravelFaspay\Debit\FaspayConfigs;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentStatusRequest;

class FaspayPaymentStatusRequestWrapper extends FaspayPaymentStatusRequest {

    function __construct($request, $trxId, $bill_no, FaspayConfigs $FaspayConfig) {
        parent::setRequest($request);
        parent::setTrx_id($trxId);
        parent::setBill_no($bill_no);
        parent::setMerchant_id($FaspayConfig->getUser()->getMerchantId());
        parent::setSignature(sha1(md5($FaspayConfig->getUser()->getUserId().$FaspayConfig->getUser()->getPassword().$bill_no)));
    }

}
