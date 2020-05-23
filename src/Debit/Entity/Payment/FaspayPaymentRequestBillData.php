<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Payment;

class FaspayPaymentRequestBillData {

    const PAY_TYPE_PAY_TYPE_FULL_SETTLEMENT = 1;
    const PAY_TYPE_INSTALLMENT = 2;
    const PAY_TYPE_MIXED = 3;

    private $bill_no;
    private $bill_reff;
    private $bill_date;
    private $bill_expired;
    private $bill_desc;
    private $bill_currency;
    private $bill_gross;
    private $bill_tax;
    private $bill_miscfee;
    private $bill_total;
    private $billing_name;
    private $billing_lastname;
    private $billing_address;
    private $billing_address_city;
    private $billing_address_region;
    private $billing_address_state;
    private $billing_address_poscode;
    private $billing_msisdn;
    private $billing_address_country_code;
    private $item;
    private $pay_type;

    public static function managed($billNo, $billDesc, $expired_day_interval, $billTotal, $item, $payType) {
        $Date1 = date("Y-m-d H:i:s");
        
        $date = new \DateTime($Date1);
        $date->add(new \DateInterval('P'.$expired_day_interval.'D')); // P1D means a period of 1 day

        $next = date_format($date, "Y-m-d H:i:s");

        $instance = new self();
        
        $instance->setBill_date($Date1);
        
        $instance->setPay_type($payType);
        $instance->setBill_expired($expired_day_interval);
        $instance->setBill_no($billNo);
        $instance->setBill_desc($billDesc);
        $instance->setBill_total($billTotal);
        $instance->setItem($item);
        return $instance;
    }

    private function __construct() {
        
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

    function getItem() {
        return $this->item;
    }

    function setItem($item) {
        $this->item = $item;
    }

    function getPay_type() {
        return $this->pay_type;
    }

    function setPay_type($pay_type) {
        $this->pay_type = $pay_type;
    }
}
