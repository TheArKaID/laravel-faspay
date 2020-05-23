<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity;

class BillItem {

    private $product;
    private $qty;
    private $amount;
    private $paymentPlan;
    private $merchantId;
    private $tenor;

    function getProduct() {
        return $this->product;
    }

    function getQty() {
        return $this->qty;
    }

    function getAmount() {
        return $this->amount;
    }

    function getPaymentPlan() {
        return $this->paymentPlan;
    }

    function getMerchantId() {
        return $this->merchantId;
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

    function setPaymentPlan($paymentPlan) {
        $this->paymentPlan = $paymentPlan;
    }

    function setMerchantId($merchantId) {
        $this->merchantId = $merchantId;
    }

    function setTenor($tenor) {
        $this->tenor = $tenor;
    }

}
