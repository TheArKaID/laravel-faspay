<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity;

use \JsonSerializable;

class FaspayCancelPaymentRequest implements JsonSerializable{

    private $request;
    private $trx_id;
    private $merchant_id;
    private $merchant;
    private $bill_no;
    private $payment_cancel;
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

    function getMerchant() {
        return $this->merchant;
    }

    function getBill_no() {
        return $this->bill_no;
    }

    function getPayment_cancel() {
        return $this->payment_cancel;
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

    function setMerchant($merchant) {
        $this->merchant = $merchant;
    }

    function setBill_no($bill_no) {
        $this->bill_no = $bill_no;
    }

    function setPayment_cancel($payment_cancel) {
        $this->payment_cancel = $payment_cancel;
    }

    function setSignature($signature) {
        $this->signature = $signature;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
