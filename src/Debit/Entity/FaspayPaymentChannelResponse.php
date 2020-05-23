<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity;

class FaspayPaymentChannelResponse {
    
    private $response_code;
    private $response_desc;
    private $response;
    private $merchant_id;
    private $merchant;
    private $payment_channel;
    
    function getResponse() {
        return $this->response;
    }

    function getMerchant_id() {
        return $this->merchant_id;
    }

    function getMerchant() {
        return $this->merchant;
    }

    function getPayment_channel() {
        return $this->payment_channel;
    }

    function setResponse($response) {
        $this->response = $response;
    }

    function setMerchant_id($merchant_id) {
        $this->merchant_id = $merchant_id;
    }

    function setMerchant($merchant) {
        $this->merchant = $merchant;
    }

    function setPayment_channel($payment_channel) {
        $this->payment_channel = $payment_channel;
    }

        
    function getResponse_code() {
        return $this->response_code;
    }

    function getResponse_desc() {
        return $this->response_desc;
    }

    function setResponse_code($response_code) {
        $this->response_code = $response_code;
    }

    function setResponse_desc($response_desc) {
        $this->response_desc = $response_desc;
    }


}
