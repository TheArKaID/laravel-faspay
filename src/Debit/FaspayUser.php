<?php

namespace TheArKaID\LaravelFaspay\Debit;

class FaspayUser {
    private $merchantName;
    private $merchantId;
    private $userId;
    private $password;
    private $redirectUrl;

    function getMerchantName() {
        return $this->merchantName;
    }

    function getMerchantId() {
        return $this->merchantId;
    }

    function getUserId() {
        return $this->userId;
    }

    function getPassword() {
        return $this->password;
    }

    function getRedirectUrl() {
        return $this->redirectUrl;
    }

    function setMerchantName($merchantName) {
        $this->merchantName = $merchantName;
    }

    function setMerchantId($merchantId) {
        $this->merchantId = $merchantId;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRedirectUrl($redirectUrl) {
        $this->redirectUrl = $redirectUrl;
    }

    function calculateSignature() {
        $userAndPass = $this->getUserId() . $this->getPassword();
        return sha1(md5($userAndPass));
    }

}
