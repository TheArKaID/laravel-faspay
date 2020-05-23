<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity;

use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentStatusRequest;

class FaspayPaymentStatusRequestWrapperProd extends FaspayPaymentStatusRequest {
    private $payment_status_desc;
    private $payment_status_code;

    function __construct($request, $trxId, $bill_no, configs $FaspayConfig,$payment_status_desc,$payment_status_code) {
        parent::setRequest($request);
        parent::setTrx_id($trxId);
        parent::setBill_no($bill_no);
        $this->setPayment_status_code($payment_status_code);
        $this->setPayment_status_desc($payment_status_desc);
        parent::setMerchant_id($FaspayConfig->getUser()->getMerchantId());
        parent::setSignature(sha1(md5($FaspayConfig->getUser()->getUserId().$FaspayConfig->getUser()->getPassword().$bill_no)));
    }
    
    function getPayment_status_desc() {
        return $this->payment_status_desc;
    }

    function getPayment_status_code() {
        return $this->payment_status_code;
    }

    function setPayment_status_desc($payment_status_desc) {
        $this->payment_status_desc = $payment_status_desc;
    }

    function setPayment_status_code($payment_status_code) {
        $this->payment_status_code = $payment_status_code;
    }



}
