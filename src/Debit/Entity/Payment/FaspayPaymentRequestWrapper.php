<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Payment;

use \JsonSerializable;
use TheArKaID\LaravelFaspay\Debit\FaspayConfigs;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentRequest;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayPaymentChannel;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentRequestBillData;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentRequestShippingData;
use TheArKaID\LaravelFaspay\Debit\Entity\Payment\FaspayPaymentRequestUserData;
use TheArKaID\LaravelFaspay\Debit\Entity\FaspayCancelPaymentRequest;

class FaspayPaymentRequestWrapper extends FaspayPaymentRequest implements JsonSerializable{

    private $mFaspayConfig;

    const PAY_TYPE_PAY_TYPE_FULL_SETTLEMENT = 1;
    const PAY_TYPE_INSTALLMENT = 2;
    const PAY_TYPE_MIXED = 3;
    const TERMINAL_WEB = 10;
    const TERMINAL_MOBILE_APP_BLACKBERRY = 20;
    const TERMINAL_MOBILE_APP_ANDROID = 21;
    const TERMINAL_MOBILE_APP_IOS = 22;
    const TERMINAL_MOBILE_APP_WINDOWS = 23;
    const TERMINAL_MOBILE_APP_SYMBIAN = 24;
    const TERMINAL_TAB_APP_BLACKBERRY = 30;
    const TERMINAL_TAB_APP_ANDROID = 31;
    const TERMINAL_TAB_APP_IOS = 32;
    const TERMINAL_TAB_APP_WINDOWS = 33;

    function __construct(FaspayConfigs $config, FaspayPaymentRequestBillData $billing, FaspayPaymentChannel $mFaspayPaymentChannel, FaspayPaymentRequestUserData $userData, FaspayPaymentRequestShippingData $mShippingData) {
        $this->mFaspayConfig = $config;
        
        parent::setRequest("");
        
        parent::setMerchant_id($config->getUser()->getMerchantId());
        parent::setMerchant($config->getUser()->getMerchantName());

        parent::setBill_no($billing->getBill_no());
        parent::setBill_reff($billing->getBill_reff());
        parent::setBill_date($billing->getBill_date());
        parent::setBill_expired($billing->getBill_expired());
        parent::setBill_desc($billing->getBill_desc());
        parent::setBill_currency($billing->getBill_currency());
        parent::setBill_gross($billing->getBill_gross());
        parent::setBill_miscfee($billing->getBill_gross());
        parent::setBill_total($billing->getBill_total());
        parent::setCust_no($userData->getCustNo());
        parent::setCust_name($userData->getCustName());
        parent::setPayment_channel($mFaspayPaymentChannel->getPg_code());
        parent::setBank_userid($userData->getBank_userid());
        parent::setMsisdn($userData->getMsisdn());
        parent::setEmail($userData->getEmail());
        parent::setTerminal($userData->getTerminal());
        parent::setBilling_name($billing->getBilling_name());
        parent::setBilling_lastname($billing->getBilling_lastname());
        parent::setBilling_address($billing->getBilling_address());
        parent::setBilling_address_city($billing->getBilling_address_city());
        parent::setBilling_address_region($billing->getBilling_address_region());
        parent::setBilling_address_state($billing->getBilling_address_state());
        parent::setBilling_address_poscode($billing->getBilling_address_poscode());
        parent::setBilling_msisdn($billing->getBilling_msisdn());
        parent::setBilling_address_country_code($billing->getBilling_address_country_code());
        parent::setReceiver_name_for_shipping($mShippingData->getReceiver_name_for_shipping());
        parent::setShipping_lastname($mShippingData->getShipping_lastname());
        parent::setShipping_address($mShippingData->getShipping_address());
        parent::setShipping_address_city($mShippingData->getShipping_address_city());
        parent::setShipping_address_region($mShippingData->getShipping_address_region());
        parent::setShipping_address_state($mShippingData->getShipping_address_state());
        parent::setShipping_address_poscode($mShippingData->getShipping_address_poscode());
        parent::setShipping_msisdn($mShippingData->getShipping_msisdn());
        parent::setShipping_address_country_code($mShippingData->getShipping_address_country_code());
        parent::setItem($billing->getItem());
        parent::setReserve1("");
        parent::setReserve2("");
        parent::setRequest("");
        parent::setPay_type($billing->getPay_type());
        parent::setSignature(sha1(md5($config->getUser()->getUserId() . $config->getUser()->getPassword() . $this->getBill_no())));
        
    }

    public function jsonSerialize() {
        $e= parent::jsonSerialize();
        
        return parent::jsonSerialize();
    }
}
