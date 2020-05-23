<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity;

use \JsonSerializable;

class FaspayPaymentStatusResponse implements JsonSerializable{

    private $response;
    private $trx_id;
    private $merchant_id;
    private $merchant;
    private $bill_no;
    private $payment_reff;
    private $payment_date;
    private $payment_status_code;
    private $payment_status_desc;
    private $response_code;
    private $response_desc;
    
    function getResponse() {
        return $this->response;
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

    function getPayment_reff() {
        return $this->payment_reff;
    }

    function getPayment_date() {
        return $this->payment_date;
    }

    function getPayment_status_code() {
        return $this->payment_status_code;
    }

    function getPayment_status_desc() {
        return $this->payment_status_desc;
    }

    function getResponse_code() {
        return $this->response_code;
    }

    function getResponse_desc() {
        return $this->response_desc;
    }

    function setResponse($response) {
        $this->response = $response;
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

    function setPayment_reff($payment_reff) {
        $this->payment_reff = $payment_reff;
    }

    function setPayment_date($payment_date) {
        $this->payment_date = $payment_date;
    }

    function setPayment_status_code($payment_status_code) {
        $this->payment_status_code = $payment_status_code;
    }

    function setPayment_status_desc($payment_status_desc) {
        $this->payment_status_desc = $payment_status_desc;
    }

    function setResponse_code($response_code) {
        $this->response_code = $response_code;
    }

    function setResponse_desc($response_desc) {
        $this->response_desc = $response_desc;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
