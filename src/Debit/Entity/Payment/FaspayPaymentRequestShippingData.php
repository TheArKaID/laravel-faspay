<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Payment;

class FaspayPaymentRequestShippingData {
    
    private $receiver_name_for_shipping = "";
    private $shipping_lastname = "";
    private $shipping_address = "";
    private $shipping_address_city = "";
    private $shipping_address_region = "";
    private $shipping_address_state = "";
    private $shipping_address_poscode = "";
    private $shipping_msisdn = "";
    private $shipping_address_country_code = "ID";
    
    function getReceiver_name_for_shipping() {
        return $this->receiver_name_for_shipping;
    }

    function getShipping_lastname() {
        return $this->shipping_lastname;
    }

    function getShipping_address() {
        return $this->shipping_address;
    }

    function getShipping_address_city() {
        return $this->shipping_address_city;
    }

    function getShipping_address_region() {
        return $this->shipping_address_region;
    }

    function getShipping_address_state() {
        return $this->shipping_address_state;
    }

    function getShipping_address_poscode() {
        return $this->shipping_address_poscode;
    }

    function getShipping_msisdn() {
        return $this->shipping_msisdn;
    }

    function getShipping_address_country_code() {
        return $this->shipping_address_country_code;
    }

    function setReceiver_name_for_shipping($receiver_name_for_shipping) {
        $this->receiver_name_for_shipping = $receiver_name_for_shipping;
    }

    function setShipping_lastname($shipping_lastname) {
        $this->shipping_lastname = $shipping_lastname;
    }

    function setShipping_address($shipping_address) {
        $this->shipping_address = $shipping_address;
    }

    function setShipping_address_city($shipping_address_city) {
        $this->shipping_address_city = $shipping_address_city;
    }

    function setShipping_address_region($shipping_address_region) {
        $this->shipping_address_region = $shipping_address_region;
    }

    function setShipping_address_state($shipping_address_state) {
        $this->shipping_address_state = $shipping_address_state;
    }

    function setShipping_address_poscode($shipping_address_poscode) {
        $this->shipping_address_poscode = $shipping_address_poscode;
    }

    function setShipping_msisdn($shipping_msisdn) {
        $this->shipping_msisdn = $shipping_msisdn;
    }

    function setShipping_address_country_code($shipping_address_country_code) {
        $this->shipping_address_country_code = $shipping_address_country_code;
    }



}
