<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Payment;

use \JsonSerializable;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentResponseBillItem;

class FaspayPaymentResponse implements JsonSerializable{

    private $response;
    private $trx_id;
    private $merchant_id;
    private $merchant;
    private $bill_no;
    private $bill_items;
    private $response_code;
    private $response_desc;
    private $redirect_url;

    function getRedirect_url() {
        return $this->redirect_url;
    }

    function setRedirect_url($redirect_url) {
        $this->redirect_url = $redirect_url;
    }

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

    function getBill_items() {
        return $this->bill_items;
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

    function setBill_items(FaspayPaymentResponseBillItem $bill_items) {
        $this->bill_items = $bill_items;
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
