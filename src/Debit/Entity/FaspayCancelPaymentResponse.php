<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity;

use \JsonSerializable;

class FaspayCancelPaymentResponse implements JsonSerializable{
    private $response;
    private $trx_id;
    private $merchant_id;
    private $merchant;
    private $bill_no;
    private $trx_status_code;
    private $trx_status_desc;
    private $payment_status_code;
    private $payment_status_desc;
    private $payment_cancel_date;
    private $payment_cancel;
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

    function getTrx_status_code() {
        return $this->trx_status_code;
    }

    function getTrx_status_desc() {
        return $this->trx_status_desc;
    }

    function getPayment_status_code() {
        return $this->payment_status_code;
    }

    function getPayment_status_desc() {
        return $this->payment_status_desc;
    }

    function getPayment_cancel_date() {
        return $this->payment_cancel_date;
    }

    function getPayment_cancel() {
        return $this->payment_cancel;
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

    function setTrx_status_code($trx_status_code) {
        $this->trx_status_code = $trx_status_code;
    }

    function setTrx_status_desc($trx_status_desc) {
        $this->trx_status_desc = $trx_status_desc;
    }

    function setPayment_status_code($payment_status_code) {
        $this->payment_status_code = $payment_status_code;
    }

    function setPayment_status_desc($payment_status_desc) {
        $this->payment_status_desc = $payment_status_desc;
    }

    function setPayment_cancel_date($payment_cancel_date) {
        $this->payment_cancel_date = $payment_cancel_date;
    }

    function setPayment_cancel($payment_cancel) {
        $this->payment_cancel = $payment_cancel;
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
