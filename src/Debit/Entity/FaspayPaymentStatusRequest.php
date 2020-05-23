<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity;

use \JsonSerializable;

class FaspayPaymentStatusRequest implements JsonSerializable{

    private $request;
    private $trx_id;
    private $merchant_id;
    private $bill_no;
    private $signature;

    function getRequest() {
        return $this->request;
    }

    function getTrx_id() {
        return $this->trx_id;
    }

    function getMerchant_id() {
        return $this->merchant_id;
    }

    function getBill_no() {
        return $this->bill_no;
    }

    function getSignature() {
        return $this->signature;
    }

    function setRequest($request) {
        $this->request = $request;
    }

    function setTrx_id($trx_id) {
        $this->trx_id = $trx_id;
    }

    function setMerchant_id($merchant_id) {
        $this->merchant_id = $merchant_id;
    }

    function setBill_no($bill_no) {
        $this->bill_no = $bill_no;
    }

    function setSignature($signature) {
        $this->signature = $signature;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
