<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Payment;

use \JsonSerializable;
use TheArKaID\LaravelFaspay\Debit\FaspayConfigs;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayCancelPaymentRequest;

class FaspayPaymentCancelRequestWrapper extends FaspayCancelPaymentRequest implements JsonSerializable {

    function __construct($trxId, $billNo, $paymentCancel, FaspayConfigs $mConf) {
        parent::setTrx_id($trxId);
        parent::setBill_no($billNo);
        parent::setPayment_cancel($paymentCancel);
        
        parent::setMerchant($mConf->getUser()->getMerchantName());
        parent::setMerchant_id($mConf->getUser()->getMerchantId());
        $raw = $mConf->getUser()->getUserId().$mConf->getUser()->getPassword().parent::getBill_no();
        parent::setSignature(sha1(md5($raw)));                
    }

}
