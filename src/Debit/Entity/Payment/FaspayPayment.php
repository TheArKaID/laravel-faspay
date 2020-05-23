<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Payment;

use \JsonSerializable;

class FaspayPayment implements JsonSerializable{
    const PAYMENT_PLAN_FULL_SETTLEMENT = "1";
    const PAYMENT_PLAN_INSTALLMENT = "2";
    const TENOR_FULL = "00";
    const TENOR_3MONTHS = "03";   
    const TENOR_6MONTHS = "06";   
    const TENOR_12MONTHS = "12";   
    
    private $product;
    private $qty;
    private $amount;
    private $payment_plan;
    private $merchant_id;
    private $tenor;
    
    function __construct($product, $qty, $amount, $payment_plan, $merchant_id, $tenor) {
        $this->product = $product;
        $this->qty = $qty;
        $this->amount = $amount;
        $this->payment_plan = $payment_plan;
        $this->merchant_id = $merchant_id;
        $this->tenor = $tenor;
    }

    function getProduct() {
        return $this->product;
    }

    function getQty() {
        return $this->qty;
    }

    function getAmount() {
        return $this->amount;
    }

    function getPayment_plan() {
        return $this->payment_plan;
    }

    function getMerchant_id() {
        return $this->merchant_id;
    }

    function getTenor() {
        return $this->tenor;
    }

    function setProduct($product) {
        $this->product = $product;
    }

    function setQty($qty) {
        $this->qty = $qty;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setPayment_plan($payment_plan) {
        $this->payment_plan = $payment_plan;
    }

    function setMerchant_id($merchant_id) {
        $this->merchant_id = $merchant_id;
    }

    function setTenor($tenor) {
        $this->tenor = $tenor;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
