<?php

namespace TheArKaID\LaravelFaspay\Debit\Entity\Payment;

class FaspayPaymentRequestUserData {
    
    private $bank_userid;
    private $msisdn;
    private $email;
    private $terminal;
    private $custNo;
    private $custName;
    
    function __construct($msisdn, $email, $terminal, $custNo, $custName) {
        $this->msisdn = $msisdn;
        $this->email = $email;
        $this->terminal = $terminal;
        $this->custNo = $custNo;
        $this->custName = $custName;
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

    function getCustNo() {
        return $this->custNo;
    }

    function getCustName() {
        return $this->custName;
    }

    function setCustNo($custNo) {
        $this->custNo = $custNo;
    }

    function setCustName($custName) {
        $this->custName = $custName;
    }
}
