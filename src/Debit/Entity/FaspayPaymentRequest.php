<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity;

use \JsonSerializable;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPayment;

class FaspayPaymentRequest implements JsonSerializable {

    private $request;
    private $merchant_id;
    private $merchant;
    private $bill_no;
    private $bill_reff;
    private $bill_date;
    private $bill_expired;
    private $bill_desc;
    private $bill_currency;
    private $bill_gross;
    private $bill_tax = "";
    private $bill_miscfee;
    private $bill_total;
    private $cust_no;
    private $cust_name;
    private $payment_channel;
    private $pay_type;
    private $bank_userid;
    private $msisdn;
    private $email;
    private $terminal;
    private $billing_name;
    private $billing_lastname;
    private $billing_address;
    private $billing_address_city;
    private $billing_address_region;
    private $billing_address_state;
    private $billing_address_poscode;
    private $billing_msisdn;
    private $billing_address_country_code;
    private $receiver_name_for_shipping;
    private $shipping_lastname;
    private $shipping_address;
    private $shipping_address_city;
    private $shipping_address_region;
    private $shipping_address_state;
    private $shipping_address_poscode;
    private $shipping_msisdn;
    private $shipping_address_country_code;
    private $item;
    private $reserve1;
    private $reserve2;
    private $signature;

    function getRequest() {
        return $this->request;
    }

    function getMerchantId() {
        return $this->merchantId;
    }

    function getMerchant() {
        return $this->merchant;
    }

    function setMerchant($merchant) {
        $this->merchant = $merchant;
    }

    function getBill_no() {
        return $this->bill_no;
    }

    function getBill_reff() {
        return $this->bill_reff;
    }

    function getBill_date() {
        return $this->bill_date;
    }

    function getBill_expired() {
        return $this->bill_expired;
    }

    function getBill_desc() {
        return $this->bill_desc;
    }
    
    function getBill_currency() {
        return $this->bill_currency;
    }

    function getBill_gross() {
        return $this->bill_gross;
    }

    function getBill_tax() {
        return $this->bill_tax;
    }

    function getBill_miscfee() {
        return $this->bill_miscfee;
    }

    function getBill_total() {
        return $this->bill_total;
    }

    function getCust_no() {
        return $this->cust_no;
    }

    function getCust_name() {
        return $this->cust_name;
    }

    function getPayment_channel() {
        return $this->payment_channel;
    }

    function getPay_type() {
        return $this->pay_type;
    }

    function getBank_userid() {
        return $this->bank_userid;
    }

    function getMsisdn() {
        return $this->msisdn;
    }

    function getEmail() {
        return $this->email;
    }

    function getTerminal() {
        return $this->terminal;
    }

    function getBilling_name() {
        return $this->billing_name;
    }

    function getBilling_lastname() {
        return $this->billing_lastname;
    }

    function getBilling_address() {
        return $this->billing_address;
    }

    function getBilling_address_city() {
        return $this->billing_address_city;
    }

    function getBilling_address_region() {
        return $this->billing_address_region;
    }

    function getBilling_address_state() {
        return $this->billing_address_state;
    }

    function getBilling_address_poscode() {
        return $this->billing_address_poscode;
    }

    function getBilling_msisdn() {
        return $this->billing_msisdn;
    }

    function getBilling_address_country_code() {
        return $this->billing_address_country_code;
    }

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

    function getItem() {
        return $this->item;
    }

    function getReserve1() {
        return $this->reserve1;
    }

    function getReserve2() {
        return $this->reserve2;
    }

    function getSignature() {
        return $this->signature;
    }

    function setRequest($request) {
        $this->request = $request;
    }

    function getMerchant_id() {
        return $this->merchant_id;
    }

    function setMerchant_id($merchant_id) {
        $this->merchant_id = $merchant_id;
    }

    function setBill_no($bill_no) {
        $this->bill_no = $bill_no;
    }

    function setBill_reff($bill_reff) {
        $this->bill_reff = $bill_reff;
    }

    function setBill_date($bill_date) {
        $this->bill_date = $bill_date;
    }

    function setBill_expired($bill_expired) {
        $this->bill_expired = $bill_expired;
    }

    function setBill_desc($bill_desc) {
        $this->bill_desc = $bill_desc;
    }

    function setBill_currency($bill_currency) {
        $this->bill_currency = $bill_currency;
    }

    function setBill_gross($bill_gross) {
        $this->bill_gross = $bill_gross;
    }

    function setBill_tax($bill_tax) {
        $this->bill_tax = $bill_tax;
    }

    function setBill_miscfee($bill_miscfee) {
        $this->bill_miscfee = $bill_miscfee;
    }

    function setBill_total($bill_total) {
        $this->bill_total = $bill_total;
    }

    function setCust_no($cust_no) {
        $this->cust_no = $cust_no;
    }

    function setCust_name($cust_name) {
        $this->cust_name = $cust_name;
    }

    function setPayment_channel($payment_channel) {
        $this->payment_channel = $payment_channel;
    }

    function setPay_type($pay_type) {
        $this->pay_type = $pay_type;
    }

    function setBank_userid($bank_userid) {
        $this->bank_userid = $bank_userid;
    }

    function setMsisdn($msisdn) {
        $this->msisdn = $msisdn;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTerminal($terminal) {
        $this->terminal = $terminal;
    }

    function setBilling_name($billing_name) {
        $this->billing_name = $billing_name;
    }

    function setBilling_lastname($billing_lastname) {
        $this->billing_lastname = $billing_lastname;
    }

    function setBilling_address($billing_address) {
        $this->billing_address = $billing_address;
    }

    function setBilling_address_city($billing_address_city) {
        $this->billing_address_city = $billing_address_city;
    }

    function setBilling_address_region($billing_address_region) {
        $this->billing_address_region = $billing_address_region;
    }

    function setBilling_address_state($billing_address_state) {
        $this->billing_address_state = $billing_address_state;
    }

    function setBilling_address_poscode($billing_address_poscode) {
        $this->billing_address_poscode = $billing_address_poscode;
    }

    function setBilling_msisdn($billing_msisdn) {
        $this->billing_msisdn = $billing_msisdn;
    }

    function setBilling_address_country_code($billing_address_country_code) {
        $this->billing_address_country_code = $billing_address_country_code;
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

    function setItem($item) {
        $this->item = $item;
    }

    function setReserve1($reserve1) {
        $this->reserve1 = $reserve1;
    }

    function setReserve2($reserve2) {
        $this->reserve2 = $reserve2;
    }

    function setSignature($signature) {
        $this->signature = $signature;
    }

    public function jsonSerialize() {
        
        return get_object_vars($this);
    }

}
